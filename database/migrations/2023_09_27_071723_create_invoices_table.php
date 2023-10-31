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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('owner_id')->references('id')->on('users');
            $table->unsignedInteger('invoice_id');
            $table->string('invoice_to_name');
            $table->string('invoice_to_email');
            $table->text('item')->nullable();;
            $table->string('item_id')->nullable();
            $table->text('item_description')->nullable();
            $table->decimal('item_price', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
