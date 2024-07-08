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
        Schema::create('kah_product', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->string('name',length:1000);
            $table->string('slug',length:1000);
            $table->float('price');
            $table->float('pricesale')->nullable(true);
            $table->string('image',length:1000);
            $table->unsignedInteger('qty');
            $table->mediumText('detail');
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
        Schema::dropIfExists('kah_product');
    }
};
