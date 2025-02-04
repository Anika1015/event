<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
{
    if (!Schema::hasTable('reviews')) {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('ReviewID');
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('EventID');
            $table->integer('Rating');
            $table->text('Comment')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('UserID')
                  ->references('UserID')
                  ->on('users')
                  ->onDelete('cascade');
            
            $table->foreign('EventID')
                  ->references('id')
                  ->on('events')
                  ->onDelete('cascade');
        });
        
        // Add check constraint for Rating
        DB::statement('ALTER TABLE reviews ADD CONSTRAINT check_rating CHECK (Rating BETWEEN 1 AND 5)');
    }
}


};
