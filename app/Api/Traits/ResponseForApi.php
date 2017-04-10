<?php

namespace App\Api\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ResponseForApi
{
    private $statusCode = Response::HTTP_OK;

    public function responseOk(array $data)
    {
        return $this->response($data);
    }

    public function responseError($messageError = 'Error')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)
            ->response([
                'message' => $messageError
            ]);
    }

    public function responseNotFound($messageError = 'Not Found')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)
            ->response([
                'message' => $messageError
            ]);
    }
    public function response(array $data, $header = [])
    {
        return response()->json($this->setStatusCodeForResponse($data), Response::HTTP_OK, $header);
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param array $data
     * @return array
     */
    private function setStatusCodeForResponse(array $data)
    {
        $data = array_merge([
            'status_code' => $this->getStatusCode(),
            'data' => $data
        ]);

        return $data;
    }
}