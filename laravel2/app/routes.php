<?php

Route::get('/', function(){
	return View::make('inicio');
});
 
Route::get('vendedor', 'VendedorController@mostrarVendedores');
 
Route::post('vendedor', 'VendedorController@crearVendedor');
 
Route::get('producto', 'ProductoController@mostrarProductos');
 
Route::post('producto', 'ProductoController@crearProducto');

Route::get('lista', function()
{  
    $vendedores = Vendedor::with('productos')->get();
    return View::make('lista', array('vendedores'=> $vendedores));
});
