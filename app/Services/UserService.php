<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserService
{
    /**
     * @throws NotFoundException
     * @throws Exception
     */
    public function getUserById(int $userId): UserResource
    {
        $user = $this->findUser($userId);

        return new UserResource($user);
    }

    public function createUser(string $name, string $lastName, string $email): User
    {
        return User::create([
            'name' => $name,
            'last_name' => $lastName,
            'email' => $email,
            'password' => bcrypt(Str::random(40)),
        ]);
    }

    /**
     * @throws NotFoundException
     * @throws Exception
     */
    private function findUser(int $userId): User
    {
        $user = User::with('room')
            ->where('id', $userId)
            ->first();

        if (!$user) {
            throw new NotFoundException(
                sprintf('Not found user with id %d.', $userId),
            );
        }

        /** @var $user User */
        return $user;
    }
}
