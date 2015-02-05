<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proveedor extends Migration {

	public function up()
	{
		Schema::create('proveedores', function($table)
		{
			$table->increments('id')->unique();
			$table->string('nit');
			$table->string('nombre');
			$table->string('telefono');
			$table->integer('id_usuarios')->unsigned();
			$table->foreign('id_usuarios')->references('id')->on('usuarios');
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
		Schema::drop('proveedores');
	}

}
