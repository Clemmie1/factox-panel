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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();


            $table->foreignId('owner_id')->references('id')->on('users');

            $table->unsignedBigInteger('ticket_id');

            $table->text('ticket_theme');
            $table->text('ticket_category');
            $table->text('ticket_priority');
            $table->integer('ticket_status')->default(0)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
