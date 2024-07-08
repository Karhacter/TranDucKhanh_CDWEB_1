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
        Schema::create('kah_brand', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 1000);
            $table->string('slug', 1000);
            $table->string('image',1000)->nullable(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('description')->nullable(true);
            $table->date('creadted_at');
            $table->unsignedInteger('created_by');
            $table->date('updated_at')->nullable(true);
            $table->unsignedInteger('updated_by')->nullable(true);
            $table->unsignedTinyInteger('status')->default(2);
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kah_brand');
    }
};
