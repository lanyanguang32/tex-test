<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Fav;
use App\Footprint;
use App\Follow;
use App\Acclog;
use App\Transformers\FavTransformer;
use App\Transformers\ShopFollowTransformer;
use App\Transformers\FootprintShopTransformer;
use App\Transformers\FootprintSkuTransformer;
use App\Transformers\AcclogTransformer;
use App\Transformers\AcclogShopTransformer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;

//我的
class MeController extends ApiController
{
	//收藏夹
	public function getFavList()
	{
		$user_id = $this->user()->id;

		$favs = Fav::where('user_id', $user_id)->with('sku')->get();

		return $this->response->collection($favs, new FavTransformer());
	}

	//收藏
	public function postFavAdd($id)
	{
		$user_id = $this->user()->id;

		$fav = Fav::updateOrCreate([
			'user_id'=>$user_id,
			'sku_id'=>$id,
		]);

		return $this->response->item($fav, new FavTransformer());

	}
	//取消收藏
	public function postFavDel($id)
	{
		$user_id = $this->user()->id;

		Fav::where('user_id', $user_id)->where('sku_id', $id)->delete();
	}

	//关注店铺列表
	public function getShopList()
	{
		$user_id = $this->user()->id;

		$follow = Follow::where('user_id', $user_id)->with('shop')->get();

		return $this->response->collection($follow, new ShopFollowTransformer());
	}

	//关注店铺
	public function postShopFollow($id)
	{
		$user_id = $this->user()->id;

		$fav = Follow::updateOrCreate([
			'user_id'=>$user_id,
			'shop_id'=>$id,
		]);

		return $this->response->item($fav, new ShopFollowTransformer());

	}
	//取消关注店铺
	public function postShopUnFollow($id)
	{
		$user_id = $this->user()->id;

		Follow::where('user_id', $user_id)->where('shop_id', $id)->delete();
	}

	//足迹
	public function getFootprintList(Request $request)
	{
		$user_id = $this->user()->id;

		$type = 0;

		if($request->has('type')){
			$type = $request->type;
		}

		if($type == 0){
			$footprints = Footprint::where('user_id', $user_id)->where('type', $type)->with('sku')->get();
			return $this->response->collection($footprints, new FootprintSkuTransformer());
		}else{
			$footprints = Footprint::where('user_id', $user_id)->where('type', $type)->with('shop')->get();
			return $this->response->collection($footprints, new FootprintShopTransformer());
		}
	}

	//账号
	public function getAcclogShop(Request $request)
	{

		$user_id = $this->user()->id;

		$max = \DB::select("select max(id) as id from acclogs group by shop_id");

		$max = collect($max)->pluck('id')->toArray();

		$acclogs = Acclog::whereIn('id', $max)->with('shop')->get();

		return $this->response->collection($acclogs, new AcclogShopTransformer());
	}

	//账单列表
	public function getAcclogList(Request $request)
	{
		//审核后的汇总
		$user_id = $this->user()->id;
		$acclogs = Acclog::where('user_id', $user_id)->where('review', 1)->with('shop')->get();

		return $this->response->collection($acclogs, new AcclogTransformer());
	}

	//打款
	public function postAcclog(Request $request)
	{
		$user_id = $this->user()->id;

		#image
		$image = '';
   		if($request->hasFile('image')){
   			$file = $request->file('image');
   			$path = 'acclogs'.'/'.date('FY').'/';
   			$filename = Str::random(20);
	        // Make sure the filename does not exist, if it does, just regenerate
	        while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
	            $filename = Str::random(20);
	        }

	         Image::make($file);

	         $image = $path.$filename.'.'.$file->getClientOriginalExtension();
   		}
		#image

		$acclog = new Acclog();
		$acclog->user_id = $user_id;
		$acclog->shop_id = $request->shop_id;//
		$acclog->current = $request->current;//
		$acclog->bankname = $request->bankname;//
		$acclog->bankimage = $image;//
		$acclog->status = 0;
		$acclog->review = 0;
		$acclog->memo = '汇款';
		$acclog->tid = 0;
		$acclog->balance = 0;
		$acclog->save();

		return $this->response->noContent();
	}

	//









}
