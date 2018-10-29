<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\HotelRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Http\Response\ApiResponse;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return ApiResponse::getResponse('200 OK', null,  HotelResource::collection($hotels));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequest $request)
    {
        try {
            $hotel = Hotel::create($request->all());
        } catch (\Exception $e) {
            return ApiResponse::getResponse('404 Not found', $e->getMessage(),  null);
        }

        return ApiResponse::getResponse('201 OK',null,  new HotelResource($hotel));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return ApiResponse::getResponse('200 OK',null, new HotelResource($hotel));
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRequest $request, Hotel $hotel)
    {
        try {
            $hotel->update($request->all());
        } catch (\Exception $e) {
            return ApiResponse::getResponse('404 Not found', $e->getMessage(),  null);
        }

        return ApiResponse::getResponse('200 OK',null, new HotelResource($hotel));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        try {
            $hotel->delete();
        } catch (\Exception $e) {
            return ApiResponse::getResponse('404 Not found', $e->getMessage(),  null);
        }

        return ApiResponse::getResponse('200 OK', null,  null);
    }
}
