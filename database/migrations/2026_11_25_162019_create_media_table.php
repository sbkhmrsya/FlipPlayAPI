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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->unique();
            $table->string('jenis', 100)->index();
            $table->string('genre', 100);
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('episodes')->nullable();
            $table->decimal('score', 4, 2)->nullable();
            $table->string('country')->nullable();
            $table->unsignedInteger('chapters')->nullable();
            $table->unsignedInteger('volumes')->nullable();
            $table->boolean('is_available')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
