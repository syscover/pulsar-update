<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCreateTableQueries extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('update_queries'))
		{
			Schema::create('update_queries', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
                $table->integer('version_id')->unsigned();
				$table->text('query');
                $table->tinyInteger('sort')->unsigned();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('version_id', 'fk01_update_queries')
                    ->references('id')
                    ->on('update_versions')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
	    Schema::dropIfExists('update_queries');
	}
}
