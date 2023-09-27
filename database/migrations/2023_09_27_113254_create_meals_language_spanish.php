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
        Schema::connection('mysql_meals')->create('meals_esp', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('status')->default('created');
            $table->json('ingredients');
            $table->json('category');
            $table->json('tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals_language_spanish');
    }
};
