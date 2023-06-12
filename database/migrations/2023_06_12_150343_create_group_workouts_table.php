<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('group_workouts', function (Blueprint $table) {
            $table->increments('id');  // первичный ключ

            $table->date('event');
            $table->boolean('cancelled');

            $table->unsignedInteger('schedule_id');
            $table->foreign('schedule_id')->references('id')->on('schedules');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_workouts');
    }
};
