@extends('plantilla')
@section('contenido')
<h3>LISTA DE PRODUCTOS Y VENDEDORES</h3>
<hr>
<div class="row marketing">
	@foreach ($vendedores as $vendedor)
		<div class="panel panel-info">
			<div class="panel-heading">
				{{ $vendedor->nombre.' '.$vendedor->apellido}}
			</div>

			<ul class="list-group">
				@foreach($vendedor->productos as $producto)
					<li class="list-group-item">
						{{ $producto->descripcion.' '.$producto->precio}}
					</li>
				@endforeach
			</ul>
		</div>
	@endforeach
</div>

@stop