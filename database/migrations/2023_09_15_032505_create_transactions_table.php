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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('Rekeningnummer');
            $table->string('Muntsoort');
            $table->date('Transactiedatum');
            $table->date('Rentedatum');
            $table->decimal('Beginsaldo', 10, 2);
            $table->decimal('Eindsaldo', 10, 2);
            $table->decimal('Transactiebedrag', 10, 2);
            $table->text('Omschrijving');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
