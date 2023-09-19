<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupfactorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Groupfactor', function (Blueprint $table) {
            $table->id();
            $table->string('name',60);
            $table->string('slug',60)->unique();
            $table->string('status',1)->comment('1 => Active , 2 => Pending');
            $table->string('hide',1);
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
        Schema::dropIfExists('Groupfactor');
    }
}
