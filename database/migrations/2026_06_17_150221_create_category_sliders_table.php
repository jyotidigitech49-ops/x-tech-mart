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
        Schema::create('category_sliders', function (Blueprint $table) {
            $table->id();

            $table->char('status', 1)->default('A');

            $table->foreignId('cat_id')
                  ->constrained('categories')
                  ->cascadeOnDelete();

            $table->string('slider', 250);

            $table->text('link')->nullable();

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_sliders');
    }
};
