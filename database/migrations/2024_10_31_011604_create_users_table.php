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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email',100);
            $table->string('password',255);
            $table->boolean('is_admin')->default(0);
            $table->string('access_token',64)->nullable();
            $table->string('oauth_token',255)->nullable();

            $table->timestamps();
        });
    }
};
