<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b427462bf7afRelationshipsToAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function(Blueprint $table) {
            if (!Schema::hasColumn('appointments', 'patient_id')) {
                $table->integer('patient_id')->unsigned()->nullable();
                $table->foreign('patient_id', '182278_5b4273053d387')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('appointments', 'doctor_id')) {
                $table->integer('doctor_id')->unsigned()->nullable();
                $table->foreign('doctor_id', '182278_5b4273054e7df')->references('id')->on('users')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function(Blueprint $table) {
            
        });
    }
}
