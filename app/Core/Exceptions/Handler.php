<?php

namespace App\Core\Exceptions;

use App\Api\Traits\ResponseForApi;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ResponseForApi;
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->checkRequestIsApi($request)) {
            return $this->handleExceptionApi($request, $exception);
        }
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return redirect()->guest(route('login'));
    }

    /**
     * @param Request $request
     * @param Exception $e
     * @return mixed
     */
    private function handleExceptionApi(Request $request, Exception $e)
    {
        $message = $e->getMessage();

        if ($e instanceof ValidationException) {
            $message = $errors = $e->validator->errors()->first();
        } elseif ($e instanceof NotFoundHttpException) {
            $message = 'Not Found Route';
        }

        return $this->responseError($message);
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function checkRequestIsApi(Request $request)
    {
        return $request->is(API_GAURD . '*');
    }
}
