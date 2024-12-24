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
        Schema::table('habitants', function (Blueprint $table) {
            $table->id();
            $table->string('cin');
            $table->string('nom');
            $table->string('prenom');
            $table->foreignId('ville_id')->constrained('ville')->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->timestamps();        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitants');
    }
};
