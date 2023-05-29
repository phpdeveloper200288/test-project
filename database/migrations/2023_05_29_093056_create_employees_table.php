<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->unsignedInteger('department_id');
            $table->string('position')->nullable();
            $table->enum('employee_type', ['rate', 'hourly'])->nullable();
            $table->float('monthly_salary')->default(0);

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
