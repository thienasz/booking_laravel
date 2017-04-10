<?php

namespace App\Api\Transformers;


class LoginTransformer extends Transformer
{
    public function transform($userLogin)
    {
        return [
            'name' => $userLogin->name,
            'email' => $userLogin->email,
            'token' => $userLogin->token
        ];
    }
}