<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id');
            $table->text('description')->nullable();
            $table->date('date');
            $table->timestamps();

            $table->foreign('pet_id')
                ->references('id')
                ->on('pets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['pet_id']);
        });

        Schema::dropIfExists('attendances');
    }
}
