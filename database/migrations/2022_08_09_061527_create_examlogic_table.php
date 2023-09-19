<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamlogicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examlogic', function (Blueprint $table) {
            $table->id();
            $table->integer('exam_id');
            $table->integer('group_id');
            $table->integer('factor_id');
            $table->string('comparison1');
            $table->string('operation');
            $table->string('logic');
            $table->string('comparison2')->nullable();
            $table->string('textmsg1')->nullable();
            $table->string('textmsg2')->nullable();
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
        Schema::dropIfExists('examlogic');
    }
}
