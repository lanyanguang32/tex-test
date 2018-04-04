<?php

namespace App\Transformers;

use App\Message;
use League\Fractal\TransformerAbstract;

class MessageTransformer extends TransformerAbstract
{
    public function transform(Message $message)
    {
        return [
            'id' => $message->id,
            'title' => $message->title,
            'message' => $message->message,
            'readed' => $message->readed,
            'created' => $message->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
