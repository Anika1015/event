
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('BookingID'); // Primary key
            $table->unsignedBigInteger('EventID'); // Foreign key to events
            $table->unsignedBigInteger('UserID'); // Foreign key to users
            $table->date('BookingDate');
            $table->enum('Status', ['Pending', 'Confirmed', 'Cancelled']);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('EventID')
                  ->references('id')
                  ->on('events')
                  ->onDelete('cascade');

            $table->foreign('UserID')
                  ->references('UserID') // Explicit reference to UserID
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }

};
