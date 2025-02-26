<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('BookingID');
            $table->foreignId('EventID')->constrained('events')->onDelete('cascade'); // Laravel will assume 'id'
            $table->foreignId('UserID')->constrained('users')->onDelete('cascade');
            $table->string('event_name');
            $table->date('event_date');
            $table->string('location');
            $table->enum('time_slot', ['afternoon', 'night']);
            $table->integer('number_of_guests');
            $table->text('description')->nullable();
            $table->string('status')->default('pending');
            $table->string('admin_decision')->default('pending');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}


