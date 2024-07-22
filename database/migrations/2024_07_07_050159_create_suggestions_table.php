<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_id')->length(11)->nullable();
            $table->bigInteger('department_id')->length(11)->nullable();
            $table->bigInteger('plant_id')->length(11)->nullable();
            $table->bigInteger('created_by')->length(11)->nullable();
            $table->bigInteger('feedback_score')->length(11)->default(0);
            $table->string('status', 255)->default('Assigned');
            $table->date('due_date')->nullable();
            $table->date('target_date')->nullable();
            $table->json('coardinator1')->default('[]')->comment('assigned_coardinator_initially');
            $table->bigInteger('hod1')->length(11)->default(0)->comment('assigned hod by coardinator on on approve');
            $table->bigInteger('coardinator2')->length(11)->default(0)->comment('assigned coardinator by hod on implementaion');
            $table->timestamps();
        });

        Schema::create('suggestion_datas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('suggestion_id')->length(11)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('desc', 255)->nullable();
            $table->string('priority', 255)->nullable();
            $table->string('img', 255)->nullable();
            $table->string('img_desc', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('feedback_datas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('suggestion_id')->length(11)->nullable();
            $table->longText('feedback_text1', 255)->nullable()->comment('feedback added by coardinator');
            $table->longText('feedback_text2', 255)->nullable()->comment('feedback added by hod');
            $table->json('score_id')->default('[]');
            $table->bigInteger('feedback_given_by1')->length(11)->nullable()->comment('feedback added by coardinator1');
            $table->bigInteger('feedback_given_by2')->length(11)->nullable()->comment('feedback added by hod2');
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
        Schema::dropIfExists('suggestions');
        Schema::dropIfExists('suggestion_datas');
        Schema::dropIfExists('feedback_datas');
    }
}
