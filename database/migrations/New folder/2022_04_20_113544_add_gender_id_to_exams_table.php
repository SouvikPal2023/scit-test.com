<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderIdToExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->integer('gender_id')->after('subject_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn('gender_id');
        });
    }
}
