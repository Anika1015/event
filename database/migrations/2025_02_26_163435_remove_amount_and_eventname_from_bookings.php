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
        $table->dropColumn('amount');
        $table->dropColumn('event_name');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->decimal('amount', 8, 2); // Adjust the type if needed
        $table->string('event_name'); // Adjust the type if needed
    });
}

};
