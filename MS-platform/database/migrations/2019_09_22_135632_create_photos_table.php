<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('discription');
            $table->text('photo');
            $table->timestamp('added_on');
            $table->float('geolocation');
            $table->timestamps();
        });
    }

    // - id
	// - user_id
	// - Photo
	// - Date
	// - discription
    // - Location

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
