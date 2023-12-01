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
        Schema::create('domain_names', function (Blueprint $table) {

            $table->id();
            $table->foreignId('owner_id')->references('id')->on('users');
            $table->string('domain_name_id')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('creation_date')->nullable();
            $table->string('updated_date')->nullable();
            $table->string('registry_expiry_date')->nullable();
            // 0 - Ожидание -> 1 - создание -> 2 - активный -> 3 - приостановлен -> 4 - удален -> 5 - Ошибка
            $table->boolean('status')->default(1)->nullable();

            $table->string('domain_ns1')->default('ns1.factox.cloud')->nullable();
            $table->string('domain_ns2')->default('ns2.factox.cloud')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_names');
    }
};
