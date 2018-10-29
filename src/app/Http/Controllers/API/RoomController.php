<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Http\Resources\RoomResource;
use App\Http\Response\ApiResponse;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return ApiResponse::getResponse('200 OK', null, RoomResource::collection($rooms));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        try {
            $room = Room::create($request->all());
        } catch (\Exception $e) {
            return ApiResponse::getResponse('404 Not found', $e->getMessage(),  null);
        }

        return ApiResponse::getResponse('201 OK',null, new RoomResource($room));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
       return ApiResponse::getResponse('200 OK',null, new RoomResource($room));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, Room $room)
    {
        try {
            $room->update($request->all());
        } catch (\Exception $e) {
            return ApiResponse::getResponse('404 Not found', $e->getMessage(),  null);
        }

        return ApiResponse::getResponse('200 OK',null, new RoomResource($room));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        try {
            $room->delete();
        } catch (\Exception $e) {
            return ApiResponse::getResponse('404 Not found', $e->getMessage(),  null);
        }

        return ApiResponse::getResponse('200 OK', null,  null);
    }
}
