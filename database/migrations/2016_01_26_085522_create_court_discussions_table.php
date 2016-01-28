<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourtDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_discussions', function (Blueprint $table) {
            $table->increments('id');
            

            $table->integer('court_id')->unsigned();
            $table->foreign('court_id')->references('id')->on('courts')->onDelete('cascade');

            $table->string('discussion');
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
        Schema::drop('court_discussions');
    }
}
