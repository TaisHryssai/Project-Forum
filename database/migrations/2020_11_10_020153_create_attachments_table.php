<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->string('attachmentable_type');
            $table->string('attachmentable_id');
            $table->unsignedBigInteger('topic_id')->index();
            $table->foreign('topic_id')
                    ->references('id')
                    ->on('topics')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('response_id')->index();
            $table->foreign('response_id')
                    ->references('id')
                    ->on('responses')
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
        Schema::dropIfExists('attachments');
    }
}
