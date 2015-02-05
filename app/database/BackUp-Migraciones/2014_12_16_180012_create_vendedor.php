<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendedor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendedor', function( $table)
		{
			$table->increments('id')->unique();
			$table->string('nombre', 128);
			$table->string('apellido');
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
		Schema::table('vendedor', function(Blueprint $table)
		{
			//
		});
	}

}
