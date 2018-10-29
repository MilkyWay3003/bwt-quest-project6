<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRatingInHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
        $table->dropColumn('rating');
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->decimal('rating',10,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn('rating');
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->decimal('rating',10,2);
        });
    }
}
