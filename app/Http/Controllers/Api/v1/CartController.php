<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Cart;
use App\Cartdel;
use App\Trade;
use App\Tradesku;
use App\Receiver;
use App\Stock;
use App\Acclog;
use App\Transformers\CartTransformer;
use App\Transformers\CartDelTransformer;
use App\Transformers\CartShopTransformer;
use App\Http\Requests\Api\CartRequest;
use App\Http\Requests\Api\CartEditRequest;
use App\Http\Requests\Api\CartPaymentRequest;
use App\Http\Requests\Api\CartStockRequest;


class CartController extends ApiController
{

  //历史购物车
  public function getCartHistory(Request $request)
  {
    
     $user_id = $this->user()->id;
     
     if($request->has('shop_id')){
        $carDels = CartDel::where('user_id', $user_id)->where('shop_id', $request->shop_id)->with('sku')->get();
     }else{
        $carDels = CartDel::where('user_id', $user_id)->with('sku')->get();
     }

     return $this->response->collection($carDels, new CartDelTransformer());

  }
  //选择供应商
  public function getCartShop()
  {
     $user_id = $this->user()->id;
     
     $carts = Cart::where('user_id', $user_id)->groupBy('shop_id')->with('shop')->get();

     return $this->response->collection($carts, new CartShopTransformer());
  }

  //添加型号
  public function postCartSku(CartRequest $cart)
  {
      $user_id = $this->user()->id;

      $sku_ids = explode(',', $cart->sku_id);

      foreach ($sku_ids as $sku_id) {
         $newcart = Cart::firstOrNew([
            'user_id' => $user_id,
            'sku_id' => $sku_id,
            'status' => 0,
            'shop_id' => $cart->shop_id,
        ]);

         $newcart->save();
      }

     return $this->response->noContent();
  }

  //编辑
  public function postCartSkuEdit($id, CartEditRequest $cart)
  {

     $user_id = $this->user()->id;

     Cart::where('id', $id)->where('user_id', $user_id)->update([
        'price' => $cart->price,
        'num' => $cart->num,
      ]);

     $cart = Cart::find($id);

     return $this->response->item($cart, new CartTransformer());
  }

  //删除
  public function postCartSkuDel($id)
  {
    $user_id = $this->user()->id;

    $cart = Cart::where('id', $id)->where('user_id', $user_id)->first();

    //进入历史购物车
    Cartdel::updateOrCreate([
        'user_id' => $cart->user_id,
        'shop_id' => $cart->shop_id,
        'sku_id' => $cart->sku_id,
    ]);

    //删除
    $cart->delete();

    return $this->response->noContent();
  }

  //确认备货
  public function postCartStock(CartStockRequest $cartStock)
  {
    $user_id = $this->user()->id;

    $ids = explode(',', $cartStock->cart_ids);

     Cart::whereIn('id', $ids)->where('user_id', $user_id)->update([
        'status' => 1
      ]);

      return $this->response->noContent();
  }

  //确认支付
  public function postCartPayment(CartPaymentRequest $cartPayment)
  {
    $user_id = $this->user()->id;

    $shop_id = $cartPayment->shop_id;

    $cartIds = explode(',', $cartPayment->cart_ids);

      //关联扣款?
        $max = Acclog::where('user_id', $user_id)->where('shop_id', $shop_id)->where('review', 1)->max('id');
        if($max){
           $acclog = Acclog::find($max);
           if($acclog->balance>=$cartPayment->payment){

            //
            $receiver = Receiver::find($cartPayment->receiver_id);

            //支付并且创建新订单
            $trade = Trade::create([
              'user_id'=>$user_id,
              'shop_id'=>$cartPayment->shop_id,
              'payment'=>$cartPayment->payment,
              'paytime'=>date('Y-m-d H:i:s', time()),
              'receivername'=>$receiver->user,
              'recevierphone'=>$receiver->phone,
              'recevierprovince'=>$receiver->province,
              'receviercity'=>$receiver->city,
              'recevierarea'=>$receiver->area,
              'recevierstreet'=>$receiver->street,
              'receiveraddress'=>'',
              'paymethod'=>'',
              'tid'=>time().date('Ymd').rand(1001,9299),
            ]);

            $carts = Cart::whereIn('id', $cartIds)->with('sku')->get();

            foreach ($carts as $cart) {
                //选择购物车支付
                $mid = Tradesku::create([
                    'title' => $cart->sku->sku,
                    'image' => $cart->sku->image,
                    'price' => $cart->price,
                    'num' => $cart->num,
                    'tid' => $trade->tid,
                    'material' => $cart->material,
                    'weight' => $cart->weight,
                ]);

                //同步备货
                Stock::where('cart_id', $cart->id)->update([
                  'mid'=>$mid->id,
                ]);

                //加入历史购物车
                Cartdel::updateOrCreate([
                  'user_id' => $cart->user_id,
                  'shop_id' => $cart->shop_id,
                  'sku_id' => $cart->sku_id,
                ]);
            }
            //删除购物车
            Cart::whereIn('id', $cartIds)->delete();

            //
            $newacclog = new Acclog;
            $newacclog->user_id = $user_id;
            $newacclog->shop_id = $shop_id;
            $newacclog->status = 1;
            $newacclog->current = $cartPayment->payment;
            $newacclog->memo = '订单支出';
            $newacclog->tid = $trade->tid;
            $newacclog->balance = $acclog->balance - $cartPayment->payment;
            $newacclog->review = 1;
            $newacclog->save();
            //
          }
        }else{
          return $this->errorCustom('账户余额不足');
        }
      //关联扣款

      return $this->response->noContent();
  }

  //购物车
  public function getCartList(Request $request)
  {
     $user_id = $this->user()->id;

     $shop_id = $request->shop_id;

     $status = 0;

     if($request->has('status')){
        $status = $request->status; 
     }
        

     $carts = Cart::where('user_id', $user_id)->where('shop_id', $shop_id)->where('status', $status)->get();
   
     return $this->response->collection($carts, new CartTransformer());
  }
   
}
