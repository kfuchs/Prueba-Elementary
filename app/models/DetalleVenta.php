<?php 

class DetalleVenta extends Eloquent{
	protected $fillable = ['id_ventas', 'id_productos','cantidad','precio','total'];
	protected $table = 'detalle_ventas';

	public function venta()
	{
        return $this->hasMany('ventas', 'id_ventas');
    }

    public function producto()
    {
        return $this->hasMany('productos', 'id_productos');
    }

}
