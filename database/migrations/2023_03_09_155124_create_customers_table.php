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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('object');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('mother_name')->nullable();

            $table->string('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();

            $table->string('address')->nullable();
            $table->string('id_number')->unique();

            $table->string('phone');
            $table->string('other_phone')->nullable();

            $table->string('career')->nullable();
            $table->string('place_of_work')->nullable();


            $table->string('date_of_issuing_the_id')->nullable();
            $table->string('place_issue_of_id')->nullable();

            $table->string('active');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
