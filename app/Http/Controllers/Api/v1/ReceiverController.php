<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Receiver;
use App\Transformers\ReceiverTransformer;
use App\Http\Requests\Api\ReceiverRequest;


class ReceiverController extends ApiController
{
  
  //收货地址
  public function getReceiverList()
  {
  	 $user_id = $this->user()->id;

  	 $receivers = Receiver::where('user_id', $user_id)->get();

  	 return $this->response->collection($receivers, new ReceiverTransformer());
  }

  //新增
  public function postReceiver(ReceiverRequest $request)
  {
  	 $user_id = $this->user()->id;

  	 if($request->has('def') && $request->def == 1){
		//恢复默认
		Receiver::where('user_id', $user_id)->update([
			'def'=>0
		]);
  	}

  	 $receiver = Receiver::create([
  	 	'user_id' => $user_id,
  	 	'user' => $request->name,
  	 	'phone' => $request->phone,
  	 	'province' => $request->province,
  	 	'city' => $request->city,
  	 	'area' => $request->area,
  	 	'street' => $request->street,
  	 	'address' => $request->tag,
  	 	'def' => $request->def,
  	 ]);

  	 return $this->response->item($receiver, new ReceiverTransformer());

  }
  //编辑
  public function postReceiverEdit($id, ReceiverRequest $request)
  {
  	$user_id = $this->user()->id;

  	if($request->has('def') && $request->def == 1){
		//恢复默认
		Receiver::where('user_id', $user_id)->update([
			'def'=>0
		]);
  	}

  	//编辑
  	$receiver = Receiver::where('user_id', $user_id)->where('id', $id)->update([
  		'user' => $request->name,
  	 	'phone' => $request->phone,
  	 	'province' => $request->province,
  	 	'city' => $request->city,
  	 	'area' => $request->area,
  	 	'street' => $request->street,
  	 	'address' => $request->tag,
  	 	'def' => $request->def,
  	]);

  	$receiver = Receiver::find($id);

  	return $this->response->item($receiver, new ReceiverTransformer());
  }
  //删除
  public function postReceiverDel($id)
  {
  	$user_id = $this->user()->id;

  	Receiver::where('id', $id)->where('user_id', $user_id)->delete();

  	return $this->response->noContent();
  }
  //设置为默认
  public function postReceiverDef($id)
  {
  	$user_id = $this->user()->id;

  	//恢复默认
  	Receiver::where('user_id', $user_id)->update([
  		'def'=>0
  	]);

  	$receiver = Receiver::where('id', $id)->where('user_id', $user_id)->first();
  	$receiver->update([
  		'def' => 1
  	]);

  	return $this->response->noContent();
  }

}
