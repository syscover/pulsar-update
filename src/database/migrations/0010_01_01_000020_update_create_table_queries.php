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
                $table->integer('version_id');
				$table->text('query');
                $table->tinyInteger('sort');

                $table->timestamps();
                $table->softDeletes();
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
