<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\ApiController;
use App\Message;
use App\Transformers\MessageTransformer;

//消息
class MessageController extends ApiController
{
    //消息列表
    public function getMessageList(Request $request)
    {
        $user_id = $this->user()->id;
        $message = Message::where('user_id', $user_id)->where('type', $request->type)->get();
        return $this->response->collection($message, new MessageTransformer());
    }

    //阅读消息
    public function postMessageRead($id)
    {
        $user_id = $this->user()->id;

        Message::where('id', $id)->where('user_id', $user_id)->update([
            'readed' => 1
        ]);

        return $this->response->noContent();
    }

    //删除消息
    public function postMessageDel($id)
    {
        $user_id = $this->user()->id;

        Message::where('id', $id)->where('user_id', $user_id)->delete();

        return $this->response->noContent();
    }


}
