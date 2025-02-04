<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_rules', function (Blueprint $table) {
            $table->string('type', 50)->nullable()->unique('type');
            $table->decimal('min_price', 20)->nullable();
            $table->string('rule', 50)->nullable();
            $table->integer('category')->nullable();
            $table->integer('product_count')->nullable();
            $table->integer('quantity')->nullable();
            $table->tinyInteger('rate')->nullable();
            $table->string('description', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_rules');
    }
}
