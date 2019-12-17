<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pricing_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->integer ('order_number');
            $table->string('order_name');
            $table->string('customer_name');
            $table->string('email');
            $table->string('service_type');
            $table->integer('qty');
            $table->string('provide_content');
            $table->string('fast_delivery');
            $table->string('message');
            $table->string('country')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('completed')->default(false);
            $table->float('amount');
            $table->float('amount_spent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
