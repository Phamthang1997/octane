<?php

namespace App\Traits\Response;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

trait ApiResponse
{
    protected function successResponse(
        $data = null,
        $message = null,
        $code = ResponseAlias::HTTP_OK
    ) {
        return response()->json(
            [
                "success" => true,
                "message" => $message,
                "data" => $data,
            ],
            $code
        );
    }

    protected function errorResponse(
        $message = null,
        $err_code = null,
        $code = ResponseAlias::HTTP_BAD_REQUEST,
        $data = null
    ) {
        return response()->json(
            [
                "success" => false,
                "message" => $message,
                "code" => $err_code,
                "data" => $data,
            ],
            $code
        );
    }

    /**
     * unAuthorizedErrorResponse
     *
     * @param string $message
     * @param mixed|null $err_code
     * @param mixed $code
     * @return JsonResponse
     */
    protected function unAuthorizedErrorResponse(
        string $message = 'null',
        mixed $err_code = null,
        mixed $code = ResponseAlias::HTTP_UNAUTHORIZED,
    ): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'message' => $message,
                'code' => $err_code,
            ],
            $code
        );
    }

    /**
     * notFoundErrorResponse
     *
     * @param mixed|null $message
     * @param mixed|null $err_code
     * @param mixed $code
     * @return JsonResponse
     */
    protected function notFoundErrorResponse(
        string $message = 'null',
        mixed $err_code = null,
        mixed $code = ResponseAlias::HTTP_BAD_REQUEST,
    ): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'message' => $message,
                'code' => $err_code,
            ],
            $code
        );
    }

    /**
     * badRequestErrorResponse
     *
     * @param mixed|null $message
     * @param mixed|null $err_code
     * @param mixed $code
     * @return JsonResponse
     */
    public function badRequestErrorResponse(
        string $message = 'null',
        mixed $err_code = null,
        mixed $code = ResponseAlias::HTTP_BAD_REQUEST,
    ): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'message' => $message,
                'code' => $err_code,
            ],
            $code
        );
    }

    /**
     * notMethodRequestErrorResponse
     *
     * @param mixed|null $message
     * @param mixed|null $err_code
     * @param mixed $code
     * @return JsonResponse
     */
    public function notMethodRequestErrorResponse(
        string $message = 'null',
        mixed $err_code = null,
        mixed $code = ResponseAlias::HTTP_METHOD_NOT_ALLOWED,
    ): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'message' => $message,
                'code' => $err_code,
            ],
            $code
        );
    }

    /**
     * customErrorResponse
     *
     * @param mixed $message
     * @param mixed|null $err_code
     * @param mixed|null $code
     * @return JsonResponse
     */
    public function customErrorResponse(
        mixed $message,
        mixed $err_code,
        mixed $code,
    ): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'code' => $err_code,
        ], $code);
    }

    /**
     * successEmptyResponse
     *
     * @param array $data
     * @param mixed|null $code
     * @return JsonResponse
     */
    protected function successEmptyResponse(
        array $data,
        mixed $code = ResponseAlias::HTTP_OK
    ) {
        $dataTemplate = [
            'success' => true,
            'message' => null,
            'data' => null
        ];

        $data = array_merge($dataTemplate, $data);

        return response()->json($data, $code);
    }
}
