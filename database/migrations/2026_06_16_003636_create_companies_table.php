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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
             $table->string('name', 150);
            $table->string('business_name', 200)->nullable();

            $table->string('nit', 30)->nullable();
            $table->string('dv', 5)->nullable();

            $table->string('email', 150)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('mobile', 50)->nullable();

            $table->string('address', 255)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('department', 100)->nullable();

            $table->string('logo')->nullable();

            // Facturación
            $table->string('invoice_prefix', 20)->default('FV');
            $table->unsignedBigInteger('invoice_consecutive')->default(1);

            // Impuestos
            $table->decimal('tax_percentage', 10, 2)->default(19);

            // Estado
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
