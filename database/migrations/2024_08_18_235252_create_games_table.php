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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('typed_word', 7)->nullable();
            $table->integer('attempts')->default(7);
            $table->string('status');
            $table->unsignedBigInteger('word_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('word_id')->references('id')->on('words');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
