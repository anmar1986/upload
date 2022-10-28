<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filmtitle');
            $table->string('filmmaker');
            $table->string('yourage');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('plz');
            $table->string('ort');
            $table->string('land');
            $table->string('telefon');
            $table->string('email');
            $table->string('filmlength');
            $table->string('productindate');
            $table->string('filmexplaining');
            $table->string('whoareyou');
            $table->string('didyougethelp');
            $table->string('nextproject');
            $table->string('anymoreinfo');
            $table->string('filesavepath');
            $table->boolean('newsletter');
            $table->boolean('termsandconditions');
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
        Schema::dropIfExists('contacts');
    }
}
