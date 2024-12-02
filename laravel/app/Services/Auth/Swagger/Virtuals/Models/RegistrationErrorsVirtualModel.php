<?php

namespace App\Services\Auth\Swagger\Virtuals\Models;

/**
 * @OA\Schema(
 *     title="RegistrationErrorsVirtualModel",
 *     description="Errors Virtual Model",
 *     @OA\Xml(
 *         name="RegistrationErrorsVirtualModel"
 *     )
 * )
 */
class RegistrationErrorsVirtualModel
{
    /**
     * @OA\Property(
     *      property="email",
     *      type="array",
     *      @OA\Items(example="The field email is required")
     * )
     */
    public string $email;

    /**
     * @OA\Property(
     *      property="password",
     *      type="array",
     *      @OA\Items(example="The field password is required")
     * )
     */
    public string $password;

    /**
     * @OA\Property(
     *      property="gender",
     *      type="array",
     *      @OA\Items(example="The field gender is required")
     * )
     */
    public string $gender;
}
