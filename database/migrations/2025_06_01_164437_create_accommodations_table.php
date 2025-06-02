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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable(); // Ditambahkan: Kolom 'type'
            $table->text('description')->nullable();
            $table->string('location');
            $table->json('amenities')->nullable();
            $table->decimal('price_per_night', 10, 2);
            $table->string('owner_phone')->nullable(); // Ditambahkan: Kolom 'owner_phone'
            $table->foreignId('provider_id')->constrained('users')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};