<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Transformers\OrderTransformer;
use App\Trade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;

class OrderController extends ApiController
{

   //订单列表
   public function getOrderList(Request $request)
   {
   		$user_id = $this->user()->id;

   		$status = 0;

   		$shop_id = $request->shop_id;

   		if($request->has('status')){
   			$status = $request->status;
   		}

   		$orders = Trade::where('user_id', $user_id)->where('shop_id', $shop_id)->where('status', $status)->with(['skus'])->get();

   		return $this->response->collection($orders, new OrderTransformer());
   }


   //发货
   public function postOrderShip($id, Request $request)
   {

   		$shipimage = '';
   		if($request->hasFile('shipimage')){
   			$file = $request->file('shipimage');
   			$path = 'orders'.'/'.date('FY').'/';
   			$filename = Str::random(20);
	        // Make sure the filename does not exist, if it does, just regenerate
	        while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
	            $filename = Str::random(20);
	        }

	         $image = Image::make($file);

	         $shipimage = $path.$filename.'.'.$file->getClientOriginalExtension();
   		}

   		$user_id = $this->user()->id;
   		$order = Trade::where('user_id', $user_id)->where('id', $id)->first();
   		//发货图片

   		//
   		$order->shipimage = $shipimage;
   		$order->shiptime = date('Y-m-d H:i:s', time());
   		$order->status = 1;
   		$order->save();
   		return $this->response->noContent();
   }


   //确认收货
   public function postOrderConfirm($id, Request $request)
   {

   	   	$receiverimage = '';
   		if($request->hasFile('receiverimage')){
   			$file = $request->file('receiverimage');
   			$path = 'textures'.'/'.date('FY').'/';
   			$filename = Str::random(20);
	        // Make sure the filename does not exist, if it does, just regenerate
	        while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
	            $filename = Str::random(20);
	        }

	         $image = Image::make($file);

	         $receiverimage = $path.$filename.'.'.$file->getClientOriginalExtension();
   		}

   		$user_id = $this->user()->id;
   		$order = Trade::where('user_id', $user_id)->where('id', $id)->first();
   		//发货图片
   		$order->receiverimage = $receiverimage;
   		$order->receivertime = date('Y-m-d H:i:s', time());
   		$order->endtime = date('Y-m-d H:i:s', time());
   		$order->status = 2;
   		$order->save();
   		return $this->response->noContent();
   }

}
