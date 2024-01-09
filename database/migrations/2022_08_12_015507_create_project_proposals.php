<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectProposals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_proposals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('freelancer_id')->unsigned();
            $table->bigInteger('project_id')->unsigned();
            $table->decimal('price')->unsigned()->default(0.00);
            $table->bigInteger('hours')->unsigned()->default(0);
            $table->tinyInteger('type')->unsigned()->default(0);
            $table->text('letter')->nullable();
            $table->timestamps();


            $table->foreign('freelancer_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
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
        Schema::dropIfExists('project_proposals');
    }
}
