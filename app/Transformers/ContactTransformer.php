<?php

namespace App\Transformers;

use App\Contact;
use League\Fractal\TransformerAbstract;

class ContactTransformer extends TransformerAbstract
{
    public function transform(Contact $contact)
    {
        return [
            'id' => $contact->id,
            'name' => $contact->name,
            'phone' => $contact->phone,
            'company' => $contact->company,
            'address' => $contact->address,
            'created' => $contact->created_at->format('Y-m-d H:i:s'),
            'status' => $contact->status, //0 未邀请 1 已邀请 2 已注册
        ];
    }
}
