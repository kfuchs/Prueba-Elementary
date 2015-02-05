<?php 

class Cliente extends Eloquent{
	protected $fillable = ['nombre', 'nit','direccion'];
	protected $table = 'clientes';
}