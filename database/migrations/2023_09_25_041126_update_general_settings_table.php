<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->string('contact_email')->nullable();
            $table->char('contact_phone')->nullable();
            $table->string('contact_loc')->nullable();
            $table->text('contact_map')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            $table->dropColumn('contact_email');
            $table->dropColumn('contact_phone');
            $table->dropColumn('contact_loc');
            $table->dropColumn('contact_map');

        });
    }
}
