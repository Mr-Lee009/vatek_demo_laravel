<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            //$table->uuid("UUID")->default(DB::raw('(UUID())'))->primary(); // tu tao UUID
            $table->string("UUID")->default(DB::raw('(UUID())'))->primary();
            $table->string("NAME_ROOM");
            $table->string("TYPE_ROOM");
            $table->string("DESCRIPTION");

            $table->timestamp('CREATE_DATE')->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();

            $table->string("HOTEL_ID");

            //set foreign key
            $table->foreign("HOTEL_ID")
                ->references('UUID')
                ->on('hotels')
                ->onDelete('cascade') ;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
