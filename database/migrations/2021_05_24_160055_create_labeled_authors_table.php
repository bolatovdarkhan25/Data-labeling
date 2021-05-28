<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabeledAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labeled_authors', function (Blueprint $table) {
            $table->id();
            $table->decimal('start');
            $table->decimal('end');
            $table->string('author');
            $table->unsignedBigInteger('audio_file_id');
            $table->timestamps();

            $table->foreign('audio_file_id')
                ->references('id')
                ->on('audio_files')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labeled_authors');
    }
}
