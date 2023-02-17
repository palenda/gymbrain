<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\ForbiddenException;
use App\Exceptions\NotFoundException;
use App\Http\Resources\Resume\ResumeResource;
use App\Http\Resources\Room\RoomResource;
use App\Models\Resume;
use App\Models\Room;
use Exception;

class RoomService
{
    public const ORIGINAL_RESUME_TITLE = 'Original CV';

    public function __construct(
        private readonly UserService $userService,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws Exception
     */
    public function getRoom(int $roomId): RoomResource
    {
        $room = $this->findResume($roomId);

        return new RoomResource($room);
    }

    /**
     * @param array<string> $resumeData
     * @throws NotFoundException
     * @throws Exception
     */
    public function createRoom(array $roomData): RoomResource
    {
        $user = $this->userService->getUserById(
            (int)$roomData['user_id'],
        );
        $departmentId = (int)$roomData['department_id'];
        $this->departmentService->getDepartment(
            $departmentId,
        );
        $resume = Room::create([
            'user_id' => $user->id,
            'title' => $roomData['title'],
            'name' => $roomData['name'],
            'last_modified' => $user->name . ' ' . $user->last_name,
            'is_origin' => 0,
        ]);

        return new ResumeResource($resume);
    }

    /**
     * @param array<string> $resumeData
     * @throws NotFoundException
     * @throws Exception
     */
    public function updateResume(array $resumeData): ResumeResource
    {
        $user = $this->userService->getUserById(
            (int)$resumeData['user_id'],
        );
        $resume = $this->findResume(
            (int)$resumeData['resume_id'],
        );
        $departmentId = (int)$resumeData['department_id'];
        $this->departmentService->getDepartment($departmentId);
        $resume->update([
            'title' => $resumeData['title'],
            'name' => $resumeData['name'],
            'last_name' => $resumeData['last_name'],
            'email' => $resumeData['email'],
            'department_id' => $departmentId,
            'last_modified' => $user->name . ' ' . $user->last_name,
        ]);

        return new ResumeResource($resume);
    }

    public function createOriginResume(int $userId, string $name, string $lastName, string $email): ResumeResource
    {
        $resume = Resume::firstOrCreate([
            'user_id' => $userId,
            'is_origin' => true,
        ], [
            'user_id' => $userId,
            'title' => self::ORIGINAL_RESUME_TITLE,
            'name' => $name,
            'last_name' => $lastName,
            'email' => $email,
            'last_modified' => $name . ' ' . $lastName,
            'is_origin' => true,
        ]);

        return new ResumeResource($resume);
    }

    /**
     * @throws NotFoundException
     * @throws Exception
     */
    public function deleteResume(int $resumeId): void
    {
        $resume = $this->findResume($resumeId);

        if ($resume->is_origin) {
            throw new ForbiddenException(
                __('api-validation-messages.original_resume_deleting', ['id' => $resumeId]),
            );
        }

        $resume->delete();
    }

    /**
     * @throws NotFoundException
     * @throws Exception
     */
    private function findResume(int $resumeId): Resume
    {
        $resume = Resume::find($resumeId);
        if (!$resume) {
            throw new NotFoundException(
                sprintf('Not found resume with id %d.', $resumeId),
            );
        }

        return $resume;
    }
}

