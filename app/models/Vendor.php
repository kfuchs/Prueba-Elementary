<?php 
use Illuminate\Database\Eloquent\Collection;

class Vendor extends Eloquent{

	protected $fillable = ['nit', 'nombre','telefono','id_usuarios'];
	protected $table = 'proveedores';


}