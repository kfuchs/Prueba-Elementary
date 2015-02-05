<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compras extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compras', function($table)
		{
			$table->increments('id')->unique();
			$table->integer('id_proveedores')->unsigned();
			$table->foreign('id_proveedores')->references('id')->on('proveedores');
			$table->integer('id_usuarios')->unsigned();
			$table->foreign('id_usuarios')->references('id')->on('usuarios');
			$table->string('no_factura');
			$table->date('fecha');
			$table->decimal('total');
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
		Schema::drop('compras');
	}

}
