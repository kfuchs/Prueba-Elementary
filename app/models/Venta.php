<?php 

class Venta extends Eloquent{
	protected $fillable = ['fecha', 'clave','total','id_clientes','id_usuarios'];
	protected $table = 'ventas';

	public function cliente()
	{
        return $this->hasMany('clientes', 'id_clientes');
    }

    public function usuario()
    {
        return $this->hasMany('usuarios', 'id_usuarios');
    }

}

