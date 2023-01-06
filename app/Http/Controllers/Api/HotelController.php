<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;

/**
 * @SWG\Swagger(
 *      schemes={"http", "https"},
 *      @SWG\Info(
 *          version="1.0.0",
 *          title="L5 Swagger API",
 *          description="Hotels API description",
 *          @SWG\Contact(
 *              email="darius@matulionis.lt"
 *          ),
 *      )
 *  )
 */
class HotelController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/hotels/",
     *      summary="Title",
     *      security={{"bearer_token":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Donec sollicitudin molestie malesuada."
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="An error has occurred."
     *      )
     *  )
     */
    public function index()
    {
        $hotels = Hotel::all();
        //return response()->json($hotels);
        return HotelResource::collection($hotels);
    }
}
