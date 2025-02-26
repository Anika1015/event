<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('amount', 8, 2)->nullable()->after('status');
            $table->date('payment_deadline')->nullable()->after('amount');
            $table->enum('payment_status', ['pending', 'paid'])->default('pending')->after('payment_deadline');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['amount', 'payment_deadline', 'payment_status']);
        });
    }
};

