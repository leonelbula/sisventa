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
        Schema::create('kardex', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->dateTime('movement_date');

            $table->string('type', 20);

            $table->string('reference')->nullable();
            $table->string('user')->nullable();

            $table->unsignedInteger('quantity');

            $table->unsignedInteger('stock_before');

            $table->unsignedInteger('stock_after');

            $table->integer('unit_cost')->default(0);

            $table->integer('total_cost')->default(0);

            $table->text('observation')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kardex');
    }
};
