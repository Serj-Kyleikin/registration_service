<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Response as HTTPResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @OA\Info(
 *     title="Hint Service",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email=""
 *     )
 * )
 * @OA\Server(
 *     url="",
 *     description=""
 * )
 * @OAS\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function successResponse(?string $message = null, array|object|null $data = null, int $code = HTTPResponse::HTTP_OK): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function errorResponse(\Exception $exception): JsonResponse
    {
        $message = $exception->getMessage();
        $code = (strlen($exception->getCode()) === 3) ? $exception->getCode() : HTTPResponse::HTTP_BAD_REQUEST;

        return response()->json([
            'status' => false, 
            'message' => $message
        ], $code);
    }
}
