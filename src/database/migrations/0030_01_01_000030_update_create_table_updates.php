<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCreateTableUpdates extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('update_updates'))
		{
			Schema::create('update_updates', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
                $table->string('start_version', 20);
                $table->string('end_version', 20);
                $table->string('license');

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
	    Schema::dropIfExists('update_updates');
	}
}
