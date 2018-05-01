<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1525174494EngagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('engagements')) {
            Schema::create('engagements', function (Blueprint $table) {
                $table->increments('id');
                $table->date('stats_date')->nullable();
                $table->integer('fans')->nullable();
                $table->integer('engagements')->nullable();
                $table->integer('reactions')->nullable();
                $table->integer('comments')->nullable();
                $table->integer('shares')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engagements');
    }
}
