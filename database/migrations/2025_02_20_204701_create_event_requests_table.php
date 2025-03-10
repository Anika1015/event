<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('event_requests', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // User who made the request
        $table->string('event_title');
        $table->text('event_description');
        $table->date('event_date');
        $table->string('status')->default('pending'); // Pending, approved, or rejected
        $table->timestamps();

        // Add foreign key constraint for user_id
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('event_requests');
}
};
