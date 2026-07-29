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
        Schema::create('product_enquiries', function (Blueprint $table) {
            $table->id();

            $table->integer('product_id');

            $table->string('first_name', 100);

            $table->string('last_name', 100);

            $table->string('email', 150);

            $table->string('phone', 20);

            $table->integer('quantity');

            $table->string('company', 150)
                  ->nullable();

            $table->text('message');

            $table->string('ip_address', 50)
                  ->nullable();

            $table->dateTime('inserted_at')
                  ->nullable()
                  ->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_enquiries');
    }
};
