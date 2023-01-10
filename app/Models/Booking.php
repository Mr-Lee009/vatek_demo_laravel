<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        "UUID",
        "ROOM_ID",
        "NAME_CUSTOMER",
        "CREATE_DATE",
        "UPDATE_DATE"
    ];

    public $connection = 'mysql_2';

    protected $table = 'booking';
    protected $primaryKey = 'UUID';
    public $incrementing = false;

    public $keyType = 'string';
    const CREATED_AT = 'CREATE_DATE';
    const UPDATED_AT = 'UPDATE_DATE';

    protected $dateFormat = 'd-m-Y';
}
