<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topic_id')->index();
            $table->foreign('topic_id')
                    ->references('id')
                    ->on('topics')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('keyword_id')->index();
            $table->foreign('keyword_id')
                    ->references('id')
                    ->on('keywords')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('topic_keywords');
    }
}
