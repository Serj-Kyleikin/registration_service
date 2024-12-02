<?php

namespace App\Http\Requests\API\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      description="Регистрация нового пользователя"
 * )
 */
class RegistrationRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="email",
     *      description="Почта",
     *      example="client@site.ru"
     * )
     */
    public string $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="Пароль",
     *      example="1k4g9asd"
     * )
     */
    public string $password;

    /**
     * @OA\Property(
     *      title="gender",
     *      description="Логин",
     *      example="m"
     * )
     */
    public string $gender;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "email" => "required|string|unique:users,email|email",
            "password" => "required|string",
            "gender" => "required|string",
        ];
    }

    public function messages(): array
    {
        return [
            'email' => [
                'required' => "The field email is required",
                'string' => "The field email must be string type",
                'unique' => "Email must be unique",
                'email' => "The field email must contain valid email address"
            ],
            'password' => [
                'required' => "The field password is required",
                'string' => "The field password must be string type",
            ],
            'gender' => [
                'required' => "The field gender is required",
                'string' => "The field gender must be string type",
            ],
        ];
    }
}
