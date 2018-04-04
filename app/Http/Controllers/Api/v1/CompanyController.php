<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Shop;
use App\ShopUser;
use App\User;
use App\Sku;
use App\Transformers\ShopuserTransformer;
use App\Transformers\CartSkuTransformer;

//公司
class CompanyController extends ApiController
{
	//成员列表
	public function getCompanyUser()
	{
		$user_id = $this->user()->id;

		$users = Shopuser::where('shop_id', $user_id)->with('user')->get();

		return $this->response->collection($users, new ShopuserTransformer());
	}

	//邀请用户
	public function postCompanyUserInvite(Request $request)
	{
		$phone = $request->phone;
		$user_id = $this->user()->id;

		$user = User::where('phone', $phone)->first();

		$shopuser = null;
		if($user){
			$shopuser = Shopuser::create([
				'shop_id'=>$user_id,
				'user_id'=>$user->id,
				'status'=>0,
			]);
		}

		return $this->response->item($shopuser, new ShopuserTransformer());
	}

	//取消邀请
	public function postCompanyUserDel($id)
	{
		$user_id = $this->user()->id;

		Shopuser::where('shop_id', $user_id)->where('id', $id)->delete();

		return $this->response->noContent();
	}

	//添加用户 todo request phone
	public function postCompanyUser(Request $request)
	{
		$user_id = $this->user()->id;

		$user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

		$shopuser = Shopuser::create([
			'shop_id'=>$user_id,
			'user_id'=>$user->id,
			'status'=>1,
		]);

		return $this->response->item($shopuser, new ShopuserTransformer());
	}


	//通过邀请
	public function postCompanyApply($id)
	{
		$user_id = $this->user()->id;

		Shopuser::where('shop_id', $user_id)->where('id', $id)->update([
			'status'=>1
		]);

		return $this->response->noContent();
	}


	//拒绝邀请
	public function postCompanyUnApply($id)
	{
		$user_id = $this->user()->id;

		Shopuser::where('shop_id', $user_id)->where('id', $id)->update([
			'status'=>2
		]);

		return $this->response->noContent();
	}

	//产品
    public function getCompanySku()
    {
    	$user_id = $this->user()->id;
    	$skus = Sku::where('user_id', $user_id)->get();

    	return $this->response->collection($skus, new CartSkuTransformer());
    }

    //添加
    public function postCompanySku(Request $request)
    {
    	$user_id = $this->user()->id;

    	$sku = Sku::fill($request->all());

    	return $this->response->item($sku, new CartSkuTransformer());
    }

    //编辑
    public function postCompanySkuEdit($id, Request $request)
    {
    	$user_id = $this->user()->id;
    	$sku = Sku::where('user_id', $user_id)->where('id', $id)->update($request->all());
    	return $this->response->item($sku, new CartSkuTransformer());
    }

    //删除
    public function postCompanySkuDel($id)
    {
    	$user_id = $this->user()->id;
    	Sku::where('user_id', $user_id)->where('id', $id)->delete();

    	return $this->response->noContent();
    }

    //上架
    public function postCompanySkuShelf($id)
    {
    	$user_id = $this->user()->id;
    	Sku::where('user_id', $user_id)->where('id', $id)->update([
    		'status'=>1,
    	]);

    	return $this->response->noContent();
    }

    //下架
    public function postCompanySkuUnShelf($id)
    {
    	$user_id = $this->user()->id;
    	Sku::where('user_id', $user_id)->where('id', $id)->update([
    		'status'=>0,
    	]);

    	return $this->response->noContent();
    }
}
