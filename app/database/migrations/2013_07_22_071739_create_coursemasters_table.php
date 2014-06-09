<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursemastersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursemasters', function(Blueprint $table) {
            $table->increments('id');
            $table->string('=courseCategory_id');
			$table->string('courseName');
			$table->string('courseDescription');
			$table->string('courseFees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coursemasters');
    }

}
