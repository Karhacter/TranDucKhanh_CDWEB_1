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
        Schema::create('kah_user', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name',length:255);
            $table->string('email',length:255);
            $table->string('phone',length:255);
            $table->string('username',length:255);
            $table->string('password',length:255);
            $table->string('address',length:255);
            $table->string('image',length:255);
            $table->string('roles',length:50);
            $table->dateTime('creadted_at');
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
        Schema::dropIfExists('kah_user');
    }
};
