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
                $table->string('minimal_panel_version', 20)->nullable();               // minimal panel version to load this version
                $table->boolean('composer')->default(false);                            // execute composer update command
                $table->boolean('publish')->default(false);                             // execute publish force command
                $table->boolean('migration')->default(false);                           // execute migration command
                $table->text('query')->nullable();                                            // execute query command
                $table->boolean('provide')->default(false);                             // flag to provide this version
                $table->timestamp('provide_from')->default(DB::raw('CURRENT_TIMESTAMP'));     // date to provide this version

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
