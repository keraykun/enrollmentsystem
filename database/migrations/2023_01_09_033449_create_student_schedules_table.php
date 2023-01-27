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
        Schema::create('student_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_academic_id')->constrained('student_academics')->cascadeOnDelete();
            $table->foreignId('teacher_schedule_id')->constrained('teacher_schedules')->cascadeOnDelete();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_schedules');
    }
};
