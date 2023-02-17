<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomController extends ApiController
{
    public function __construct(private readonly RoomService $roomService)
    {
    }

    public function getRoom(): JsonResponse
    {
        $rooms = Room::all();

        return response()->json(['data' => $rooms]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show(int $roomId): JsonResponse
    {
        $room = Room::where($roomId)->firstOrFail();
        return response()->json(['data' => $room]);
    }

    public function edit(Room $room)
    {
        //
    }

    public function update(Request $request, Room $room)
    {
        //
    }

    public function destroy(Room $room)
    {
        //
    }
}
