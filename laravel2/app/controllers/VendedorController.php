<?php 

class VendedorController extends BaseController {
 
    public function mostrarVendedores(){
        $vendedores = Vendedor::all();
        return View::make('vendedor.lista', array('vendedores' => $vendedores));
    }
 
    public function crearVendedor(){
        
        $respuesta = Vendedor::agregarVendedor(Input::all());
        
        if ($respuesta['error'] == true){
            return Redirect::to('vendedor')->withErrors($respuesta['mensaje'] )->withInput();
        }else{
            return Redirect::to('vendedor')->with('mensaje', $respuesta['mensaje']);
        }
    }
}