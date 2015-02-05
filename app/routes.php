<?php


Route::get('login', 'AuthController@showLogin');

Route::post('login', 'AuthController@postLogin');

Route::group(array('before' =>'auth'), function()
{
    Route::get('/', function()
    {
        return View::make('inicio');
    });
    Route::get('logout', 'AuthController@logOut');
});

Route::group(array('prefix'=>'usuario'), function()
{ 
        Route::post('edit','UserController@update');
        Route::get('create','UserController@create');
        Route::post('create','UserController@create_new');
        Route::get('cargar','UserController@cargar');
        Route::post('cargar','UserController@confirm');
        Route::post('delete','UserController@delete');
        Route::post('addRol','UserController@addRol');
        Route::post('delRol','UserController@delRol');
        Route::get('tabla','UserController@table');

});

Route::get('consulta', function()
{  
	$Constulta=DB::table('compras')
    ->join('detalle_compras', 'compras.id', '=', 'detalle_compras.id_compras')
    ->join('productos', 'productos.id', '=', 'detalle_compras.id_productos')
    ->join('marcas', 'marcas.id', '=', 'productos.id_marcas')
    ->join('usuarios', 'usuarios.id', '=', 'compras.id_usuarios')
    ->join('proveedores', 'proveedores.id', '=', 'compras.id_proveedores')
    ->select(
       'productos.codigo',
       'productos.nombre',
       'marcas.descripcion',
       'detalle_compras.precio',
       'detalle_compras.cantidad',
       'detalle_compras.total',
       'proveedores.nombre as proveedor',
       'usuarios.name',
       'compras.total as compra')
    ->get();
    return View::make('consulta',array('mostrar'=> $Constulta));
});

Route::get('consulta2', function()
{  
    $query = Compra::all();

    return View::make('consulta2',array('mostrar2'=>$query));
});

Route::get('messaje', function()
{  
    $mensaje=array('tipo' => 'warning','mensaje'=>'Permiso Negado..!');
    
    return $mensaje;
});


