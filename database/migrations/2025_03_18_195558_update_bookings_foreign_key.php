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
        Schema::table('bookings', function (Blueprint $table) {
            // Drop the existing foreign key constraint (if it exists)
            $table->dropForeign(['EventID']);

            // Make sure EventID column allows NULL values
            $table->unsignedBigInteger('EventID')->nullable()->change();

            // Re-add foreign key constraint with ON DELETE SET NULL
            $table->foreign('EventID')->references('id')->on('events')->onDelete('set null');
        });
    }
    /**
     * Reverse the migrations.
     */
    
     public function down()
     {
         Schema::table('bookings', function (Blueprint $table) {
             // Drop the modified foreign key
             $table->dropForeign(['EventID']);
 
             // Restore EventID to NOT NULL (if required)
             $table->unsignedBigInteger('EventID')->nullable(false)->change();
 
             // Re-add original foreign key with default behavior (restrict deletion)
             $table->foreign('EventID')->references('id')->on('events')->onDelete('restrict');
         });
     }

};
