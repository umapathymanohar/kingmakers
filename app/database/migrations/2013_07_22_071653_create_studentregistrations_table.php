<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentregistrationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentregistrations', function(Blueprint $table) {
            $table->increments('id');
            $table->string('studentName');
			$table->string('studentFathersName');
			$table->string('studentDateOfBirth');
			$table->string('studentCommunity');
			$table->string('studentCommunicationAddressLine1');
			$table->string('studentCommunicationAddressLine2');
			$table->string('studentCommunicationCity');
			$table->string('studentCommunicationState');
			$table->string('studentCommunicationPinCode');
			$table->string('studentPermanentAddressLine1');
			$table->string('studentPermanentAddressLine2');
			$table->string('studentPermanentCity');
			$table->string('studentPermanentState');
			$table->string('studentPermanentPinCode');
			$table->string('studentEmail');
			$table->string('studentPhone');
			$table->string('studentCourseCategory_id');
			$table->string('studentCourse_id');
			$table->string('studentBatch_id');
			$table->string('studentOptional_id');
			$table->string('studentCourseFees');
			$table->string('studentTotalFees');
			$table->string('studentDiscount');
			$table->string('studentDiscountDescription');
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
        Schema::drop('studentregistrations');
    }

}
