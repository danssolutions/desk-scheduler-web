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
        
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('desk_id');
            $table->integer('height');
            $table->string('time_from');
            $table->string('days');
             $table->string('alarm_sound'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
