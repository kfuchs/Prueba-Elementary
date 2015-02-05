<?php 

use Illuminate\Database\Eloquent\Collection;

class Compra extends Eloquent{
	protected $fillable = ['id_proveedores', 'id_usuarios','no_factura','fecha','total'];
	protected $table = 'compras';

	public function Detalle()
	{
        return $this->hasMany('DetalleCompra','id_compras');
    }

    public function Usuarios()
	{
        return $this->belongsTo('User','id_usuarios');
    }

    public function Proveedor()
	{
        return $this->belongsTo('Vendor','id_proveedores');
    }
}
