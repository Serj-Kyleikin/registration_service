<?php

namespace App\Services\Auth\Swagger\Virtuals\Models;

/**
 * @OA\Schema(
 *     title="AuthTokenDataVirtualModel",
 *     description="Auth Token Data Virtual Model",
 *     @OA\Xml(
 *         name="AuthTokenDataVirtualModel"
 *     )
 * )
 */
class AuthTokenDataVirtualModel
{
    /**
     * @OA\Property(
     *      property="access_token",
     *      type="string",
     *      example="T3|C3RtNI8baWXz5NfmotXuIpM2xOiKj1IfiCQ7jhLj3a8c82e6"
     * )
     */
    public string $access_token;

    /**
     * @OA\Property(
     *      property="token_type",
     *      type="string",
     *      example="Bearer"
     * )
     */
    public string $token_type;
}
