<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('ReviewID');
            $table->unsignedBigInteger('UserID'); // Explicitly use unsignedBigInteger
            $table->unsignedBigInteger('EventID'); // Explicitly use unsignedBigInteger
            $table->integer('Rating')->checkBetween(1, 5); // Rating between 1 and 5
            $table->text('Comment')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('UserID')
                  ->references('UserID') // Reference UserID from users table
                  ->on('users')
                  ->onDelete('cascade');
            
            // Foreign key constraints for EventID referencing the `id` from the events table
            $table->foreign('EventID')
                  ->references('id') // Reference `id` from events table
                  ->on('events')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }

};
