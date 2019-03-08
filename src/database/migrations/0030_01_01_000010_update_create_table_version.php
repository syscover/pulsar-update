<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCreateTableVersion extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('update_version'))
		{
			Schema::create('update_version', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
                $table->string('name');
                $table->integer('package_id')->unsigned();
                $table->string('version', 20);
                $table->boolean('migration')->default(false);       // execute migration from migration_path
                $table->boolean('config')->default(false);          // publish force config file
                $table->text('query')->nullable();                        // execute query
                $table->boolean('publish')->default(false);

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('package_id', 'fk01_update_version')
                    ->references('id')
                    ->on('admin_package')
                    ->onDelete('restrict')
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
	    Schema::dropIfExists('update_version');
	}
}
