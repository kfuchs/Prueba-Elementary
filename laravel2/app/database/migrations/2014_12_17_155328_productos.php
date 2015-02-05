<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('productos', function($table)
		{
			$table->increments('id')->unique();
			$table->integer('id_proveedores')->unsigned();
			$table->foreign('id_proveedores')->references('id')->on('proveedores');
			$table->integer('id_marcas')->unsigned();
			$table->foreign('id_marcas')->references('id')->on('marcas');
			$table->string('codigo');
			$table->string('nombre');
			$table->string('descripcion');
			$table->decimal('precio_costo');
			$table->decimal('precio_venta');
			$table->decimal('exitencia');

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
		Schema::drop('productos');
	}

}
