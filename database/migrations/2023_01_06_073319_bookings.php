<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mysql_2")->create('booking', function (Blueprint $table) {
            $table->string("UUID")->default(DB::raw('(UUID())'))->primary();
            $table->string("ROOM_ID");
            $table->string("NAME_CUSTOMER");
            $table->timestamp('CREATE_DATE')->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
