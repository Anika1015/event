<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id('PortfolioID');
            $table->foreignId('EventID')->constrained('events')->onDelete('cascade');
            $table->enum('Type', ['Image', 'Video']);
            $table->string('Path', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }

};
