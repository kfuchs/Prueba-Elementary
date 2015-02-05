@extends('plantilla')
@section('contenido')
<div class="row marketing">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3>CREAR PRODUCTO</h3>
		</div>
		{{ Form::open( array('url'=>'producto','class'=>'formulario','width'=>'600'))}}
		@if ( Session::get('mensaje'))
		<div class="alert alert-success">
			{{ Session::get('mensaje')}}
		</div>
		@endif
		<div class="form-group">
			{{ Form::label('descripcion','Descripcion',array('class'=>'col-sm-2 control-label'))}}
			<div class="col-sm-10">
				{{ Form::text('descripcion',Input::old('descripcion'),array('class'=>'form-control','placeholder'=>'descripcion del producto','autocomplete'=>'of'))}}
			</div>
		</div>
		@if($errors->has('descripcion'))
		<div class="alert alert-danger">
			@foreach($errors->get('descripcion') as $error)
			*{{$error}} </br>
			@endforeach
		</div>
		@endif
		<br>
		<br>
		<div class="form-group">
			{{Form::label('precio','Precio',array('class'=>'col-sm-2 control-label'))}}
			<div class="col-sm-10">
				{{Form::text('precio',Input::old('precio'),array('class'=>'form-control','placeholder'=>'precio del producto','autocomplete'=>'of'))}}
			</div>
		</div>
		@if($errors->has('precio'))
		<div class="alert alert-danger">
			@foreach($errors->get('precio') as $error)
			*{{$error}} </br>
			@endforeach
		</div>
		@endif
		<br>
		<br>
		<div class="form-group">
			{{Form::label('vendedor_id','Vendedor',array('class'=>'col-sm-2 control-label'))}}
			<div class="col-sm-10">
				<select name="vendedor_id" id="" class="form-control">
					@foreach ($vendedores as $vendedor) 
					<option value="{{$vendedor->id}}">{{ $vendedor->nombre.' '.$vendedor->apellido}}</option>
					@endforeach
				</select>
			</div>
		</div>
		@if($errors->has('vendedor_id'))
		<div class="alert alert-danger">
			@foreach($errors->get('vendedor_id') as $error)
			*{{$error}} </br>
			@endforeach
		</div>
		@endif
		<br>
		<br>
		<div align="right">
			{{Form::submit('Guardar',array('class'=>'btn btn-success'))}}
			{{Form::reset('Resetear',array('class'=>'btn btn-default'))}}
		</div>

		{{Form::close()}}
	</div>
</div>
<h3>PRODUCTOS</h3>
<div class="list-group">
	@foreach($productos as $producto)
	<a href="#" class="list-group-item">
		{{$producto->descripcion.' '.$producto->precio}}
	</a>
	@endforeach
</div>
@stop