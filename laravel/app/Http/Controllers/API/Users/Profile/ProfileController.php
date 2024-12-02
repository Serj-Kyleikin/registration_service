<?php

namespace App\Http\Controllers\API\Users\Profile;

use App\Http\Controllers\Controller;
use App\Models\{
    User,
};
use Illuminate\{
    Http\JsonResponse,
};

/**
 * @OA\Tag(
 *     name="Profile",
 *     description="Операции с профилем"
 * )
 */
class ProfileController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/profile",
     *     operationId="ApiV1ProfileIndex",
     *     tags={"Profile"},
     *     security={
     *         {"bearerAuth":{}}
     *     },
     *     summary="Получить данные пользователя",
     *     @OA\Response(
     *          response="200",
     *          description="Получены данные пользователя",
     *          @OA\JsonContent(ref="#/components/schemas/ProfileIndexResourse")
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", format="array", default="Unauthenticated"),
     *          )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        try {
            $userId = auth()->id();
            $data['user'] = User::select('id', 'email', 'gender')->find($userId);

            return $this->successResponse(data:$data);

        } catch (\Exception $exception) {

            return $this->errorResponse($exception);
        }
    }
}