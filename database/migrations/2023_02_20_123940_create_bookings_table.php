<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('transfer')->nullable();
            $table->string('pickup_address')->nullable();
            $table->string('drop_off_address')->nullable();
            $table->dateTime('pickup_date')->nullable();
            $table->integer('no_passengers')->nullable();
            $table->string('business_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('trip_type')->nullable();
            $table->string('driver_instructions')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('bookings');
    }
}
