<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('visits', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->string('date_and_time');
           $table->string('description');
          $table->string('duration');
          $table->string('cost');
           $table->BigInteger('doctor_id')->unsigned();
          $table->BigInteger('patient_id')->unsigned();//mite cause errors later
          $table->timestamps();

    //        $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
    //        $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('cascade');


      });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

   public function down()
   {
      Schema::dropIfExists('visits');
   }
}
