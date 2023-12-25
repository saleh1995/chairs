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
        Schema::create('title_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('title_id')->constrained()->cascadeOnDelete();
            $table->string('locale')->index();
            $table->string('name');

            $table->unique(['title_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('title_translations');
    }
};
