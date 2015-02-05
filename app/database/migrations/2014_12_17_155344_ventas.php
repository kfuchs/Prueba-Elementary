<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ventas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ventas', function($table)
		{
			$table->increments('id')->unique();
			$table->integer('id_clientes')->unsigned();
			$table->foreign('id_clientes')->references('id')->on('clientes');
			$table->integer('id_usuarios')->unsigned();
			$table->foreign('id_usuarios')->references('id')->on('usuarios');
			$table->date('fecha');
			$table->string('clave');
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
		Schema::drop('ventas');
	}

}
