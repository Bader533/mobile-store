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
        Schema::create('monthy_installments', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('object');
            $table->timestamp('pay_date')->nullable();
            $table->timestamp('paid_date')->nullable();
            $table->integer('price');
            $table->string('status');
            $table->tinyInteger('installment_number');
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('contract_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthy_installments');
    }
};
