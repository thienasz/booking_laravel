<?php

namespace App\Api\Http\Controllers;

use App\Api\Traits\AuthenticatesUserByJwt;
use App\Api\Transformers\LoginTransformer;

class AuthController extends Controller
{
    use AuthenticatesUserByJwt;

    /**
     * @var LoginTransformer
     */
    private $loginTransformer;

    function __construct(LoginTransformer $loginTransformer)
    {
        $this->loginTransformer = $loginTransformer;
    }

    protected function authenticated($token, $user)
    {
        $user->token = $token;
        $login = $this->loginTransformer->transform($user);

        return $this->responseOk($login);
    }
}