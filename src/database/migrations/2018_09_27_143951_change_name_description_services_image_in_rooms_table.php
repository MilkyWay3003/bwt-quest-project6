<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameDescriptionServicesImageInRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('services');
            $table->dropColumn('image');
        });


        Schema::table('rooms', function (Blueprint $table) {
            $table->string('name', 128)->nullable();
            $table->text('description')->nullable();
            $table->text('services')->nullable();
            $table->string('image', 128)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('services');
            $table->dropColumn('image');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->string('name', 128);
            $table->text('description');
            $table->text('services');
            $table->string('image', 128);
        });
    }
}
