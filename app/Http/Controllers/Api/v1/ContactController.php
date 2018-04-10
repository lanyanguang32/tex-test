<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Contact;
use App\Transformers\ContactTransformer;

//电话
class ContactController extends ApiController
{
	//通讯录
	public function getContactList()
	{
		$user_id = $this->user()->id;

		$contacts = Contact::where('user_id', $user_id)->get();

		return $this->response->collection($contacts, new ContactTransformer());
	}

	//添加
	public function postContact(Request $request)
	{
		$user_id = $this->user()->id;

		$contact = Contact::create([
			'user_id' => $user_id,
			'name' => $request->name,
			'phone' => $request->phone,
			'company' => $request->company,
			'address' => $request->address,
			'status'=>0,
		]);

		return $this->response->item($contact, new ContactTransformer());
	}

	//编辑
	public function postContactEdit($id, Request $request)
	{
		$user_id = $this->user()->id;

		$contact = Contact::where('id', $id)->where('user_id', $user_id)->first();

		$contact->name = $request->name;
		$contact->phone = $request->phone;
		$contact->company = $request->company;
		$contact->address = $request->address;
		$contact->save();

		return $this->response->item($contact, new ContactTransformer());
	}

	//删除
	public function postContactDel($id)
	{
		$user_id = $this->user()->id;

		Contact::where('id', $id)->where('user_id', $user_id)->delete();

		return $this->response->noContent();
	}

	//邀请？todo 发短信
	public function postContactInvite($id)
	{
		$user_id = $this->user()->id;

		Contact::where('id', $id)->where('user_id', $user_id)->update([
			'status'=>1
		]);

		return $this->response->noContent();
	}
}
