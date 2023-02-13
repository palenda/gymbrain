<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static updateOrCreate(array $array, array $array1)
 */
class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function ownRooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function participateInRooms(): HasMany
    {
        return $this->hasMany(RoomUser::class, 'user_email', 'email');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(UserRoomQuestionAnswer::class);
    }
}
