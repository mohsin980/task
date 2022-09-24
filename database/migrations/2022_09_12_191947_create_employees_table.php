<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employeeNumber');
            $table->string('firstName', 50);
            $table->string('lastName', 50);
            $table->string('extension', 10);
            $table->string('email', 50);
            $table->string('officeCode', 50);
            $table->integer('reportsTo')->nullable();
            $table->string('jobTitle', 50);
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
        Schema::dropIfExists('employees');
    }
};
