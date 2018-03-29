<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Transformers\TextureTransformer;
use App\Transformers\TextureSkuTransformer;
use App\Texture;
use App\Texturesku;
use App\Receiver;
use App\Sku;

class TextureController extends ApiController
{
   
    //小样列表
   public function getTextureList(Request $request)
   {
      $user_id = $this->user()->id;

      $status = 0;

      $shop_id = $request->shop_id;

      if($request->has('status')){
        $status = $request->status;
      }

      if($status == 1){

          $textures = Texture::where('user_id', $user_id)->where('shop_id', $shop_id)->where('status', $status)->with(['skus'])->get();

          return $this->response->collection($textures, new TextureTransformer());
      }else{

          $textures = Texturesku::where('user_id', $user_id)->where('shop_id', $shop_id)->where('tid', 0)->get();

          return $this->response->collection($textures, new TextureSkuTransformer());
      }
   }


   //提交
   public function postTexture(Request $request)
   {
       $user_id = $this->user()->id;

       $receiver = Receiver::find($request->receiver_id);

       //创建订单
       $texture = Texture::create([
          'user_id'=>$user_id,
          'shop_id'=>$request->shop_id,
          'receivername'=>$receiver->user,
          'receiverphone'=>$receiver->phone,
          'recevierprovince'=>$receiver->province,
          'receviercity'=>$receiver->city,
          'recevierarea'=>$receiver->area,
          'recevierstreet'=>$receiver->street,
          'receiveraddress'=>'',
          'status'=>0,
          'tid'=>time().date('Ymd').rand(1001,9299),
       ]);

       //创建订单
       Texturesku::whereIn('id', explode(',', $request->sku_ids))->update([
          'tid'=>$texture->tid
        ]);

       return $this->response->item($texture, new TextureTransformer());
   }


   //添加
   public function postTextureSku(Request $request)
   {
       $user_id = $this->user()->id;

       $shop_id = $request->shop_id;

       $sku = Sku::find($request->sku_id);

       $texture = Texturesku::create([
          'user_id' => $user_id,
          'shop_id' => $shop_id,
          'title' => $sku->sku,
          'image' => $sku->image,
          'material' => $sku->material,
          'weight' => $sku->weight,
          'tid'=>0,
       ]);

       return $this->response->item($texture, new TextureSkuTransformer());
   }

   //删除
   public function postTextureSkuDel($id)
   {
      $user_id = $this->user()->id;

      Texturesku::where('id', $id)->where('user_id', $user_id)->delete();

      return $this->response->noContent();
   }

}
