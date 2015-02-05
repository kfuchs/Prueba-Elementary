<?php 

use Illuminate\Database\Eloquent\Collection;

class DetalleCompra extends Eloquent {

	protected $table = 'detalle_compras';
    protected $fillable = ['id_compras', 'id_productos','cantidad','precio','total'];
    public function Productos()
	{
        return $this->belongsTo('Producto','id_productos');
    }
}