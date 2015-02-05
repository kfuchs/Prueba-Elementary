<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleVentas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalle_ventas', function($table)
		{
			$table->increments('id')->unique();
			$table->integer('id_ventas')->unsigned();
			$table->foreign('id_ventas')->references('id')->on('ventas');
			$table->integer('id_productos')->unsigned();
			$table->foreign('id_productos')->references('id')->on('productos');
			$table->decimal('cantidad');
			$table->decimal('precio');
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
		Schema::drop('detalle_ventas');
	}

}
