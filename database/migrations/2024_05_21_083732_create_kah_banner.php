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
        Schema::create('kah_banner', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name',length:1000);
            $table->string('link',length:1000);
            $table->unsignedInteger('sort_order')->default(1);
            $table->string('position',length:50);
            $table->string('description',length:255)->nullable(true);
            $table->dateTime('creadted_at');
            $table->unsignedInteger('created_by');
            $table->dateTime('updated_at')->nullable(true);
            $table->unsignedInteger('updated_by')->nullable(true);
            $table->unsignedTinyInteger('status')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kah_banner');
    }
};
