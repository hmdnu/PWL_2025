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
        Schema::create('sales', function (Blueprint $table) {
            $table->id("sales_id");
            $table->unsignedBigInteger("user_id");
            $table->string("buyer");
            $table->string("sales_code", 20);
            $table->string("sales_date");
            $table->timestamp("created_at");
            $table->timestamp("updated_at");

            $table->foreign("user_id")->references("user_id")->on("user");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
