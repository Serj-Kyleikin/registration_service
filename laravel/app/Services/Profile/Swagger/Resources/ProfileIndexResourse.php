<?php

namespace App\Services\Profile\Swagger\Resources;

use App\SharedKernel\Traits\Swagger\{
    StatusSuccessResponseTrait,
    MessageNullResponseTrait,
};
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="ProfileIndexResourse",
 *     description="Профиль пользователя",
 *     @OA\Xml(
 *         name="ProfileIndexResourse"
 *     ),
 *     allOf={
 *         @OA\Schema(ref="#/components/schemas/StatusSuccessResponseTrait"),
 *         @OA\Schema(ref="#/components/schemas/MessageNullResponseTrait"),
 *     }
 * )
 */
class ProfileIndexResourse extends JsonResource
{
    use StatusSuccessResponseTrait, MessageNullResponseTrait;

    /**
     * @OA\Property(
     *      property="data",
     *      description="",
     *      type="object",
     *      @OA\Property(
     *          property="user",
     *          type="string",
     *          description="Данные пользователя",
     *          ref="#/components/schemas/User"
     *      )
     * )
     */
    public array $data;
}
