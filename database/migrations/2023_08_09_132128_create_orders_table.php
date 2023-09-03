<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Product::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Order_type::class)->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('morning')->nullable();
            $table->string('night')->nullable();
            $table->string('morning_night')->nullable();
            //////////////////////////////////
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('battary')->nullable();
            $table->string('inverter')->nullable();
            $table->string('solar')->nullable();
            $table->string('problem')->nullable();
            $table->string('extra_des')->nullable();
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
};
