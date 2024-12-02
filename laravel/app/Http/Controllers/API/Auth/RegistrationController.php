<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\{
    RegistrationRequest,
};
use App\Services\{
    Auth\RegistrationService,
};
use Illuminate\{
    Http\JsonResponse,
    Support\Facades\DB,
};

/**
 * @OA\Tag(
 *     name="Auth",
 *     description="Регистрация пользователя"
 * )
 */
class RegistrationController extends Controller
{
    public function __construct(
        private readonly RegistrationService $registrationService,
    )
    {
    }

    /**
     * @OA\Post(
     *     path="/api/registration",
     *     operationId="ApiV1Registration",
     *     tags={"Auth"},
     *     summary="Регистрация пользователя",
     *     @OA\Parameter(
     *          name="Accept",
     *          in="header",
     *          description="Accept",
     *          example="application/json",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                 required={"email", "password", "gender"},
     *                 @OA\Property(description="Почта", property="email", type="string", example="client@site.ru"),
     *                 @OA\Property(description="Пароль", property="password", type="string", example="1jd5asd68d"),
     *                 @OA\Property(description="Пол", property="gender", type="string", example="m"),
     *                 @OA\Schema(ref="#/components/schemas/SignUpRequest")
     *             )
     *          )
     *     ),
     *     @OA\Response(
     *          response="201",
     *          description="Регистрация успешна",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="string", format="array", default=true),
     *              @OA\Property(property="message", type="string", format="array", default="The user has been successfully registered"),
     *              @OA\Property(property="data", type="object", format="object", ref="#/components/schemas/AuthTokenDataVirtualModel"),
     *          )
     *     ),
     *     @OA\Response(
     *          response="422",
     *          description="Unprocessable Content",
     *          @OA\JsonContent(ref="#/components/schemas/RegistrationUnprocessableContentResource")
     *     )
     * )
     */
    public function registration(RegistrationRequest $request): JsonResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');
        DB::beginTransaction();

        try {
            $data = $this->registrationService->registration($email, $password, $gender);

            DB::commit();
            return $this->successResponse("The user has been successfully registered", $data, 201);

        } catch (\Exception $exception) {

            DB::rollBack();
            return $this->errorResponse($exception);
        }
    }
}