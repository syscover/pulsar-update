<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCreateTableVersions extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('update_versions'))
		{
			Schema::create('update_versions', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->increments('id');
                $table->string('name');
                $table->integer('package_id')->unsigned();
                $table->string('version', 20);
				$table->boolean('publish')->default(false);

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('package_id', 'fk01_update_versions')
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
	    Schema::dropIfExists('update_versions');
	}
}
