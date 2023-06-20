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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_a_id');
            $table->unsignedBigInteger('club_b_id');
            $table->integer('score_a');
            $table->integer('score_b');
            $table->timestamps();

            $table->foreign('club_a_id')->references('id')->on('clubs');
            $table->foreign('club_b_id')->references('id')->on('clubs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
