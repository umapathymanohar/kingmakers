<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionalsubjectsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optionalsubjects', function(Blueprint $table) {
            $table->increments('id');
            $table->string('=optionalSubjectName');
			$table->string('optionalSubjectDescription');
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
        Schema::drop('optionalsubjects');
    }

}
