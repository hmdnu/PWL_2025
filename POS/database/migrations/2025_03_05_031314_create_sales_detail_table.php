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
        Schema::create('sales_detail', function (Blueprint $table) {
            $table->id("sales_detail_id");
            $table->unsignedBigInteger("sales_id");
            $table->unsignedBigInteger("item_id");
            $table->integer("price");
            $table->integer("amount");
            $table->timestamp("created_at");
            $table->timestamp("updated_at");
            $table->foreign("sales_id")->references("sales_id")->on("sales");
            $table->foreign("item_id")->references("item_id")->on("item");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_detail');
    }
};
