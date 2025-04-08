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
        Schema::create('item', function (Blueprint $table) {
            $table->id('item_id');
            $table->unsignedBigInteger('category_id');
            $table->string('item_code', 10);
            $table->string('item_name', 100);
            $table->integer('buy_price');
            $table->integer('sell_price');
            $table->timestamp('created_at');
            $table->timestamp('uploaded_at');

            $table->foreign("category_id")->references("category_id")->on("category");
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
