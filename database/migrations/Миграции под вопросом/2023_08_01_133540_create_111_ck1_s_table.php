<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('111_CK1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('LocalTime', $precision = 0);
            $table->string( 'Name', 50)->unique();
            $table->float('value', 8, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('111_CK1');
    }
};
