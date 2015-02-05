<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleCompras extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalle_compras', function($table)
		{
			$table->increments('id')->unique();
			$table->integer('id_compras')->unsigned();
			$table->foreign('id_compras')->references('id')->on('compras');
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
		Schema::drop('detalle_compras');
	}

}
