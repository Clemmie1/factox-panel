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
        Schema::create('support_ticket_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->references('ticket_id')->on('support_tickets');
            $table->integer('is_user')->default(0);
            $table->text('msg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_ticket_comments');
    }
};
