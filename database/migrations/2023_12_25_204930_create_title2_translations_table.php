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
        Schema::create('title2_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('title2_id')->constrained()->cascadeOnDelete();
            $table->string('locale')->index();
            $table->string('name');

            $table->unique(['title2_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('title2_translations');
    }
};
