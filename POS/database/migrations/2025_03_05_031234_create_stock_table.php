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
        Schema::create('stock', function (Blueprint $table) {
            $table->id("stock_id");
            $table->unsignedBigInteger("item_id");
            $table->unsignedBigInteger("user_id");
            $table->dateTime("stocked_date");
            $table->integer("stock_amount");
            $table->timestamp("created_at");
            $table->timestamp("updated_at");
            $table->foreign("item_id")->references("item_id")->on("item");
            $table->foreign("user_id")->references("user_id")->on("user");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
