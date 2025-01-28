<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ensure InnoDB is used for foreign keys
            $table->id('BookingID'); // Primary key

            // Foreign key columns
            $table->unsignedBigInteger('EventID'); // Foreign key to events
            $table->unsignedBigInteger('UserID');  // Foreign key to users

            // Additional columns
            $table->date('BookingDate');
            $table->enum('Status', ['Pending', 'Confirmed', 'Cancelled']);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('EventID')
                  ->references('id')
                  ->on('events')
                  ->onDelete('cascade'); // Cascade delete on related event deletion

            $table->foreign('UserID')
                  ->references('id') // Reference 'id' column in 'users'
                  ->on('users')
                  ->onDelete('cascade'); // Cascade delete on related user deletion
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings'); // Drops the table during rollback
    }
}

