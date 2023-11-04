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

            $table->unsignedBigInteger('ticket_id');
//            $table->foreign('ticket_id')->references('ticket_id')->on('support_tickets');

            $table->integer('is_user')->default(0);
            $table->text('msg');
            $table->timestamps();
        });

        /*Schema::table('support_ticket_comments', function (Blueprint $table) {
            $table->foreign('ticket_id')->references('id')->on('support_tickets');
        });*/

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_ticket_comments');
    }
};
