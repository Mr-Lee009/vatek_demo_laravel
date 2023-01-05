<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Hotel extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        "ID",
        "NAME_HOTEL",
        "DESCRIPTION",
        "CREATE_DATE",
        "UPDATE_DATE"
    ];

    protected $table = 'hotels';
    protected $primaryKey = 'ID';

    const CREATED_AT = 'CREATE_DATE';
    const UPDATED_AT = 'UPDATE_DATE';

    public function rooms(){
        return $this->hasMany(Room::class,"HOTEL_ID");
    }
}
