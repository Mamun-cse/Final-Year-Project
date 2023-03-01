<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id');
            $table->integer('group_member_id');
            $table->integer('question_no');
            $table->decimal('duration',12,2);
            $table->date('start_date');
            $table->date('end_date');
            $table->text('title',255);
            $table->text('description',1000);
            $table->dateTime('exam_start_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('exam_end_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('topics');
    }
}
