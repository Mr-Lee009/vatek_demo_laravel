<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Service\RoomService;
use App\Models\Room;
use Illuminate\Http\Request;

/**
 * @SWG\SecurityScheme(
 *   securityDefinition="APIKeyHeader",
 *   type="apiKey",
 *   in="header",
 *   name="Authentication",
 * )
 *
 * @A
 */

/**
@OAS\SecurityScheme(
securityScheme="bearerAuth",
type="http",
scheme="bearer"
)
 **/




class RoomController extends Controller
{

    public $roomService = null;

    public function __construct()
    {
        $this->roomService = new RoomService();
    }

    /**
     * @OA\Get  (
     *     path="/api/rooms/",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function index()
    {
        return response()->json(Room::all());
        //return $this->roomService->getAll();
    }

    /**
     * @OA\Get  (
     *     path="/api/rooms/find/",
     *     summary="find Room",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function findBy($key, $value)
    {
        return response()->json($this->roomService->findBy($key, $value));
    }

    /**
     * @OA\Post   (
     *     path="/api/rooms/find/",
     *     summary="create room",
     *     security={
     *       {"ApiKeyAuth": {}}
     *     },
     *     @OA\Parameter(
     *           parameter="hotelId",
     *           name="hotelId",
     *           description="hotel Id",
     *           @OA\Schema(
     *              type="string"
     *           ),
     *           in="query",
     *           required=true
     *       ),
     *      @OA\Parameter(
     *           parameter="nameRoom",
     *           name="nameRoom",
     *           description="name's room",
     *           @OA\Schema(
     *              type="string"
     *           ),
     *           in="query",
     *           required=false
     *       ),
     *      @OA\Parameter(
     *           parameter="description",
     *           name="description",
     *           description="description about room",
     *           @OA\Schema(
     *              type="string"
     *           ),
     *           in="query",
     *           required=false
     *       ),
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function store(StoreRoomRequest $request)
    {
        return $this->roomService->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $response = null;
        $data = Room::find($room);
        if ($data != null) {
            $response = [
                "status" => "SUCCESS",
                "data" => $data
            ];
        } else {
            $response = [
                "status" => "ERROR",
                "message" => "update fail!"
            ];
        }
        return $response;
    }

    /**
     * @OA\Put  (
     *     path="/api/rooms/",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function update(Request $request, Room $room)
    {
        return $this->roomService->update($request, $room);
    }

    /**
     * @OA\Delete   (
     *     path="/api/rooms/",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function destroy(Room $room)
    {
        return $this->roomService->delete($room);
    }
}
