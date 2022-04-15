<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_creators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('link') -> nullable();
            $table->text('description')-> nullable();
            $table->string('address')-> nullable();
            $table->string('outlet')-> nullable();
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
        Schema::dropIfExists('profile_creators');
    }
}
