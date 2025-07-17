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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->double('price');
            $table->integer('stock')->default(0);
            $table->string('image_public_id')->nullable();
            $table->text('description');
            $table->boolean('is_banned')->default(false);
            $table->timestamps();
            $table->unique(['name', 'model']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
