<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();  // url generated for book 
            $table->string('name');
            $table->integer('age');
            $table->string('business_name');
            $table->string('start_year');
            $table->text('description')-> nullable();
            $table->string('email')-> nullable();
            $table->string('social_media')-> nullable();
            $table->string('linkedin')-> nullable();
            $table->text('aspirations')-> nullable();
            $table->string('image') -> nullable();

            $table->unsignedInteger('category_id')->index()->nullable();
            $table->unsignedInteger('user_id')->index()->nullable();
            $table->unsignedInteger('business_id')->index()->nullable();

            $table->boolean('is_approved') -> default(0)-> nullable();
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
