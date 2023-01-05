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
            $table->increments("ID"); // tu tao UUID
            $table->integer("HOTEL_ID");

            $table->string("NAME_ROOM");
            $table->string("TYPE_ROOM");
            $table->string("DESCRIPTION");

            $table->timestamp('CREATE_DATE')->nullable();
            $table->timestamp('UPDATE_DATE')->nullable();

            //set foreign key
            $table->foreign("HOTEL_ID")
                ->references('ID')
                ->on('hotels');
                //->onDelete('cascade');
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
