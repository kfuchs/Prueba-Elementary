<?php 
use Illuminate\Database\Eloquent\Collection;

class Producto extends Eloquent{
	protected $fillable = ['id_marcas', 'codigo','nombre','descripcion','precio_compra','precio_venta','existencia'];
	protected $table = 'productos';

	public function Marcas()
	{
        return $this->belongsTo('Marca', 'id_marcas');
    }
}