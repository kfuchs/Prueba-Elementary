@extends("plantilla")
@section('contenido')
<div class="row marketing">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3>CREAR VENDEDOR</h3>
		</div>
		{{ Form::open(array('url'=>'vendedor','class'=>'formulario')) }}

		@if (Session::get('mensaje'))
		<div class="alert alert-success">
			{{ Session::get('mensaje') }}
		</div>
		@endif
		<div class="form-group">
			{{ Form::label('nombre','Nombre',array('class'=>'col-sm-2 control-label')) }}
			<div class="col-sm-10">
				{{ Form::text('nombre',Input::old('nombre'),array('class'=>'form-control','placeholder'=>'nombre vendedor','autocomplete'=>'of')) }}
			</div>
		</div>
		@if($errors->has('nombre'))
		<div class="alert alert-danger">
			@foreach($errors->get('nombre') as $error)
			*{{$error}} </br>
			@endforeach
		</div>
		@endif
		<br>
		<br>
		<div class="form-group">
			{{Form::label('apellido','Apellido',array('class'=>'col-sm-2 control-label'))}}
			<div class="col-sm-10">
				{{Form::text('apellido',Input::old('apellido'),array('class'=>'form-control','placeholder'=>'apellido vendedor','autocomplete'=>'of'))}}
			</div>
		</div>
		@if($errors->has('apellido'))
		<div class="alert alert-danger">
			@foreach($errors->get('apellido') as $error)
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
<h3>VENDEDORES</h3>

<div class="list-group">
	@foreach($vendedores as $vendedor)
	<a href="#" class="list-group-item">
		{{$vendedor->nombre.' '.$vendedor->apellido}}
	</a>
	@endforeach
</div>
@stop