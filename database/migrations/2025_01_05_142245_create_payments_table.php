<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('BookingID');
            $table->string('PaymentMethod');
            $table->decimal('Amount', 10, 2);
            $table->timestamps();

            $table->foreign('BookingID')
                  ->references('BookingID')
                  ->on('bookings')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }

};
