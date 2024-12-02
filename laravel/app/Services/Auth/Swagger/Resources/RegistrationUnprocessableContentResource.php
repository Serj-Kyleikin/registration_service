<?php

namespace App\Services\Auth\Swagger\Resources;

use App\Services\Auth\Swagger\Virtuals\Models\RegistrationErrorsVirtualModel;

/**
 * @OA\Schema(
 *     title="RegistrationUnprocessableContentResource",
 *     description="Unprocessable content resource",
 *     @OA\Xml(
 *         name="RegistrationUnprocessableContentResource"
 *     )
 * )
 */
class RegistrationUnprocessableContentResource
{
    /**
     * @OA\Property(
     *      property="message",
     *      type="string",
     *      example="The field is required (and 2 more error)"
     * )
     */
    public string $message;

    /**
     * @OA\Property(
     *     title="errors",
     *     description="errors",
     * )
     */
    public RegistrationErrorsVirtualModel $errors;
}
