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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('parent_id')->default(0);

            $table->char('status', 1)->default('A');

            $table->string('name', 250);

            $table->string('url', 250)->unique();

            $table->string('image', 300)->nullable();

            $table->text('description')->nullable();

            $table->integer('sort')->default(0);

            $table->index('parent_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
