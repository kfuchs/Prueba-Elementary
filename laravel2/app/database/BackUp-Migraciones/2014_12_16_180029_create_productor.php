<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('producto', function($table)
		{
			$table->increments('id')->unique();
			$table->integer('vendedor_id')->unsigned();
			$table->foreign('vendedor_id')->references('id')->on('vendedor');
			$table->string('descripcion', 128);
			$table->decimal('precio');
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
		Schema::table('producto', function(Blueprint $table)
		{
			//
		});
	}

}
