<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            //$table->uuid("UUID")->default(DB::raw('(UUID())'))->primary(); // tu tao UUID
            $table->string("UUID")->default(DB::raw('(UUID())'))->primary();
            $table->string("NAME_HOTEL");
            $table->string("DESCRIPTION", 1024);
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
        Schema::dropIfExists('hotels');
    }
};
