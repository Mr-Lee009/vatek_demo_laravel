<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * @SWG\Swagger(
 *      schemes={"http", "https"},
 *      @SWG\Info(
 *          version="1.0.0",
 *          title="L5 Swagger API",
 *          description="L5 Swagger API description",
 *          @SWG\Contact(
 *              email="darius@matulionis.lt"
 *          ),
 *      )
 *  )
 */
class HomeController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/users",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function index(){
        return response()->json("home");
    }

    /**
     * @OA\Get(
     *     path="/api/createAPI",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function createAPI(){
        return response()->json("createAPI");
    }
}
