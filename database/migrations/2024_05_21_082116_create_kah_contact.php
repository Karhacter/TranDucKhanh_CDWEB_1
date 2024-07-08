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
        Schema::create('kah_contact', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->unsignedInteger('user_id')->nullable(true);
            $table->string('name',length:255);
            $table->string('email',length:255);
            $table->string('phone',length:255);
            $table->string('title',length:255);
            $table->mediumText('content');
            $table->unsignedInteger('reply_id')->default(0);
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
        Schema::dropIfExists('kah_contact');
    }
};
