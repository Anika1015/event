
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('UserID'); // Custom primary key
            $table->string('Name', 100);
            $table->string('Email', 100)->unique();
            $table->string('Password', 100);
            $table->string('PhoneNumber', 15)->nullable();
            $table->enum('Role', ['Admin', 'Client']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }

};
