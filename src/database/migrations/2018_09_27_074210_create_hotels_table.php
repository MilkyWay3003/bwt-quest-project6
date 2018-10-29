<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('hotels')){
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',128);
            $table->string('country',32);
            $table->string('city', 32);
            $table->string('postcode', 16);
            $table->string('address', 128);
            $table->text('description');
            $table->decimal('rating',10,2);
            $table->string('image', 128);
            $table->date('checkin');
            $table->date('checkout');
            $table->timestamps();
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
