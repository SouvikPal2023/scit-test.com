<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('template')->default('template_default')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('seo_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_content')->nullable();
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
        Schema::dropIfExists('new_pages');
    }
}
