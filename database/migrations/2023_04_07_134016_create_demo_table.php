<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demo', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128);
            $table->string('img_1')->nullable();
            $table->json('img_2')->nullable();
            $table->json('file_1')->nullable();
            $table->json('file_2')->nullable();
            $table->timestamps();
        });

        Schema::create('demo_form', function (Blueprint $table) {
            $table->id();
            $table->json('data')->nullable();
            $table->timestamps();
        });

        Schema::create('demo_dragger', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128);
            $table->integer('sort');
            $table->text('detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demo');
        Schema::dropIfExists('demo_dragger');
    }
};
