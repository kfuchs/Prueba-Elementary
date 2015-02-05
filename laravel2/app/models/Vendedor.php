<?php

 class Vendedor extends Eloquent  {
 
    protected $table = 'vendedor';
    protected $fillable = array('nombre', 'apellido');
 
    public function productos(){
        return $this->hasMany('Producto', 'vendedor_id');
    }
    
    public static function agregarVendedor($input){
        
        $respuesta = array();
        
        $reglas =  array(
            'nombre'  => array('required', 'max:100'),  
            'apellido' => array('required', 'max:100'),
        );
                
        $validator = Validator::make($input, $reglas);
        
        if ($validator->fails()){
            
            $respuesta['mensaje'] = $validator;
            $respuesta['error']   = true;
        }else{
        
            $vendedor = static::create($input);        
            
            $respuesta['mensaje'] = 'Vendedor creado!';
            $respuesta['error']   = false;
            $respuesta['data']    = $vendedor;
        }    
        
        return $respuesta;
  }
}