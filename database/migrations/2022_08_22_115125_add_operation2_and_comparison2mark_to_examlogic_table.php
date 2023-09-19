<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOperation2AndComparison2markToExamlogicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examlogic', function (Blueprint $table) {
            $table->string('operation2',10)->nullable;
            $table->string('comparison2mark',255)->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examlogic', function (Blueprint $table) {
            //
        });
    }
}
