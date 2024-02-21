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
        Schema::create('info_carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->string('email',255);
            $table->string('number_phone',10);
            $table->string('address',255);
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_carts');
    }
};
