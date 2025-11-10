<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hotel_owner_wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_owner_id')->constrained()->onDelete('cascade');
            $table->decimal('balance', 12, 2)->default(0.00);
            $table->string('currency', 3)->default('INR');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotel_owner_wallets');
    }
};