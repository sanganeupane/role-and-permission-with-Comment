<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadcompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leadcompanies', function (Blueprint $table) {
            $table->id();
            $table->string('companyname');
            $table->string('name');
            $table->string('username');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('service');
            $table->string('deals');
            $table->string('followup');
            $table->string('handle');
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
        Schema::dropIfExists('leadcompanies');
    }
}
