<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Hotel extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        "UUID",
        "NAME_HOTEL",
        "DESCRIPTION",
        "CREATE_DATE",
        "UPDATE_DATE"
    ];

    protected $table = 'hotels';
    protected $primaryKey = 'UUID';

    const CREATED_AT = 'CREATE_DATE';
    const UPDATED_AT = 'UPDATE_DATE';

    public $incrementing = false;


    public function rooms(){
        return $this->hasMany(Room::class,"HOTEL_ID");
    }
}
