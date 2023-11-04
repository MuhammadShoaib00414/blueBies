<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title')->nullable();
            $table->string('heading')->nullable();
            $table->string('localization')->nullable();
            $table->string('images')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
     
        });
    }

    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
