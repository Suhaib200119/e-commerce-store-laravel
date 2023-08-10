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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("category_id")->constrained()->cascadeOnDelete();
            $table->string("name",255);
            $table->string("description",255);
            $table->string("image");
            $table->unsignedInteger("quantity");
            $table->unsignedInteger("basePrice");
            $table->unsignedInteger("discount")->nullable();
            $table->enum("discount_flag",["D","N"])->default("N");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodcuts');
    }
};
