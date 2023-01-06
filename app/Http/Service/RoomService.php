<?php

namespace App\Http\Service;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;


class RoomService
{
    public function getAll()
    {
        $lstRooms = Room::all();
//        $lstRooms = Room::where('TYPE_ROOM', 'nomal')
//            ->orderby('CREATE_DATE', "DESC")
//            ->limit(5)
//            ->get();
        return RoomResource::collection($lstRooms);
    }

    public function findBy($key, $value)
    {
        switch ($key) {
            case "nameRoom":
                $key = "NAME_ROOM";
                break;
            case "typeRoom":
                $key = "TYPE_ROOM";
                break;
            default:
                return RoomResource::collection(Room::all());
        }
        //$lstRooms = Room::all();
        $lstRooms = Room::where($key, $value)
            ->orderby('CREATE_DATE', "DESC")
            ->get();
        return RoomResource::collection($lstRooms);
    }


    public
    function save(StoreRoomRequest $request)
    {
        //        C1
        //        save
        //          $Room = new Room();
        //          $Room->NAME_ROOM = 'A';
        //          $Room->DESCIPTION = 'phong vip cho cau thu 222xxx';
        //          $Room->HOTEL_ID = 1;
        //          $Room->save();
        //
        //        C2:
        //        $form_data = array(
        //            $request->nameRoom,
        //            $request->typeRoom,
        //            $request->description,
        //            $request->hotelId
        //        );
        //        $zoom = DB::insert("INSERT INTO vatek_hotel_2.rooms (NAME_ROOM, TYPE_ROOM, DESCRIPTION, HOTEL_ID)
        //        VALUES (?,?,?,?)",$form_data);
        //        return $zoom;

        $form_data = array(
            "NAME_ROOM" => $request->nameRoom,
            "TYPE_ROOM" => $request->typeRoom,
            "DESCRIPTION" => $request->description,
            "HOTEL_ID" => $request->hotelId
        );

        $Room = Room::create($form_data);
        return new RoomResource($Room);
    }

    public
    function update(Request $request, Room $Room)
    {

        $form_data = array(
            "NAME_ROOM" => $request->nameRoom,
            "TYPE_ROOM" => $request->typeRoom,
            "DESCRIPTION" => $request->description,
            "HOTEL_ID" => $request->hotelId
        );

        $isSuccess = $Room->update($form_data);

        $response = null;
        if ($isSuccess == true) {
            return response()->json([
                "status" => "200",
                "message" => "update success!"
            ]);
        }
        return response()->json([
            "status" => "500",
            "message" => "update room fail!"
        ]);
    }

    public
    function delete(Room $Room)
    {
        $isSuccess = $Room->delete();
        $reponse = null;
        if ($isSuccess == true) {
            $reponse = [
                "status" => "SUCCESS " . $isSuccess,
                "message" => "delete success!"
            ];
        } else {
            $reponse = [
                "status" => "ERROR",
                "message" => "delete fail!"
            ];
        }
        return response($reponse);
    }


// if($lstRooms->count()>0){
//     foreach($lstRooms as $item){
//         echo "Room type = ".$item->NAME_ROOM."<br>";
//     }
// }

// lay 1 ban ghi
//$Room = Room::find('991c1959-8748-11ed-9dbe-0242ac120002');

// lay theo dieu kien

// $lstRooms = Room::where('TYPE_ROOM', 'nomal')
//                 ->orderby('CREATE_DATE',"DESC")
//                 ->limit(5)
//                 ->get();


// $lstRooms = $lstRooms->reject(function ($Room) {
//     return $Room->TYPE_ROOM == "luxury";
// });

//chunk giup tien kiem bo nho
// Room::chunk(3, function($Rooms){
//     foreach($Rooms as $Room ){
//         echo $Room->TYPE_ROOM."<br>";
//     }
//     echo ("het chunk !<br>");
// });

//Cursors
// phuong thuc nay se duyet qua records bang cach su dung 1 contro.
// khi du lieu lon , phuong thuc nay dc SD de giam memory

// $lstRooms = Room::where('TYPE_ROOM', 'nomal')->cursor();
// foreach ($lstRooms as $Room) {
//     echo $Room->UUID . " => " . $Room->TYPE_ROOM . "<br>";
// }


//dd($lstRooms);

// ;
}
