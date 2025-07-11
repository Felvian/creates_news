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
            $table->increments('id');
            $table->string('theme')->nullable();
            $table->longText('post')->nullable();
            $table->string('url')->nullable()->nullable();
            $table->date('date')->nullable();
            $table->dateTime('time_for_posted')->nullable();
            $table->boolean('posted_at')->nullable();
            $table->longText('media')->nullable();
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
