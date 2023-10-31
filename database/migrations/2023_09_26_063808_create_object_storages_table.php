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
        Schema::create('object_storages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->references('id')->on('users');

            // 0 - Ожидание -> 1 - создание -> 2 - активный -> 3 - приостановлен -> 4 - удален
            $table->integer('status')->default('1')->nullable();

            $table->string('bucket_name');
            $table->string('bucket_id');

            //storageTier:  0 - Standard, 1 - Archive
            $table->integer('storageTier')->default(0)->nullable();
            $table->integer('automatic_level_detection')->default(0)->nullable();
            $table->integer('issuing_object_events')->default(0)->nullable();
            $table->integer('object_version_control')->default(0)->nullable();

            $table->date('expires');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.s
     */
    public function down(): void
    {
        Schema::dropIfExists('object_storages');
    }
};
