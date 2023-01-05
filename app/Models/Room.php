<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        "ID",
        "HOTEL_ID",
        "NAME_ROOM",
        "TYPE_ROOM",
        "DESCRIPTION",
        "CREATE_DATE",
        "UPDATE_DATE"
    ];


    // khi ban muon thay doi database connection cho model
    //public $connection = 'ten_connection';

    // $timestamps = true => update 2 cot CREATE_DATE va UPDATE_DATE trong DB
    public $timestamps = true;

    // quy uoc ten table
    /*
    Ten Mode Room => table : rooms
    */
    protected $table = 'rooms';

    // cau hinh khoa chinh
    protected $primaryKey = 'ID';

    // trong truong hop khoa chinh ko phai kieu so hoac Auto_Increment , khai bao nhu sau
    public $incrementing = true;

    public $keyType = 'integer';

    const CREATED_AT = 'CREATE_DATE';
    const UPDATED_AT = 'UPDATE_DATE';

    protected $attributes = [
        "TYPE_ROOM" => "default value"
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class,"HOTEL_ID","ID");
    }

//    public function bookings(){
//        return $this->hasMany(Booking::class);
//    }
}
