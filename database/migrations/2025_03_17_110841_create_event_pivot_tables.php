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
        // Pivot table for event_venue
        Schema::create('event_venue', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('venue_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Pivot table for event_dish_package
        Schema::create('event_dish_package', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('dish_package_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Pivot table for event_lighting_theme
        Schema::create('event_lighting_theme', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('lighting_theme_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('event_venue');
        Schema::dropIfExists('event_dish_package');
        Schema::dropIfExists('event_lighting_theme');
    }
};
