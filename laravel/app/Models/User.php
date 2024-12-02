<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\{
    Database\Eloquent\Factories\HasFactory,
    Database\Eloquent\SoftDeletes,
    Notifications\Notifiable,
    Foundation\Auth\User as Authenticatable,
    Support\Facades\Hash,
};

/**
 * @OA\Schema(
 *     schema="User",
 *     @OA\Property(property="id", type="integer", example=1, description="ID пользователя"),
 *     @OA\Property(property="email", type="string", example="client@site.ru", description="Email пользователя"),
 *     @OA\Property(property="gender", type="string", example="Мужчина", description="Пол"),
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable;

    protected $guarded = ['id'];
    protected $fillable = [
        'email',
        'password',
        'gender'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getGenderAttribute($value)
    {
        return match ($value) {
            'm' => 'мужчина',
            'w' => 'женщина',
            default => 'мужчина',
        };
    }

    public function getFreshToken(): string
    {
        return $this->createToken('auth_token')->plainTextToken;
    }
}
