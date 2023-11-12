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
        if (!Schema::hasTable('TbComplex')) {
            Schema::create('TbComplex', function (Blueprint $table) {
                $table->uuid('Complex_id')->primary();
                $table->string( 'Name', 50)->unique();
                $table->string( 'Description', 120)->nullable();

                $table->softDeletes(); // столбец отмечающий, что строка была удалена
            });
        }
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TbComplex');
        //
    }
};
