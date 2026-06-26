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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string(
                'invoice_number',
                100
            );

            $table->enum(
                'purchase_type',
                [
                    'CONTADO',
                    'CREDITO'
                ]
            )->default('CONTADO');

            $table->date(
                'purchase_date'
            );

            $table->date(
                'due_date'
            )->nullable();

            $table->unsignedBigInteger(
                'subtotal'
            )->default(0);

            $table->unsignedBigInteger(
                'tax'
            )->default(0);

            $table->unsignedBigInteger(
                'total'
            )->default(0);

            $table->enum(
                'status',
                [
                    'BORRADOR',
                    'CONFIRMADA',
                    'ANULADA'
                ]
            )->default('BORRADOR');

            $table->text(
                'observation'
            )->nullable();

            $table->foreignId(
                'confirmed_by'
            )
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp(
                'confirmed_at'
            )->nullable();

            $table->foreignId(
                'cancelled_by'
            )
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp(
                'cancelled_at'
            )->nullable();

            $table->timestamps();

            $table->index([
                'supplier_id',
                'purchase_date'
            ]);

            $table->index('status');

            $table->unique(
                'invoice_number'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
