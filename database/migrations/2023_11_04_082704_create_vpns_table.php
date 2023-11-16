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
        Schema::create('vpns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->references('id')->on('users');

            // 0 - Ожидание -> 1 - создание -> 2 - активный -> 3 - приостановлен -> 4 - удален -> 5 - Ошибка
            $table->integer('status')->default('1')->nullable();
            $table->string('vpn_location');
            $table->string('vpn_name');
            $table->string('vpn_id')->nullable();
            $table->string('vpn_access_id')->nullable();
            $table->string('vpn_access_url')->nullable();

            $table->date('expires');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vpns');
    }
};
