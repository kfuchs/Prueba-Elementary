<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tienda</title>
	{{ HTML::style('css/main.css'); }}
</head>
<body>
	<div class="apollo">
		<div class="apollo-container clearfix">
			<div class="apollo-facebook" align="center">
				<h3>Autenticacion</h3><hr>
			</div>
			<div class="apollo-login">

				@if(Session::has('mensaje_error'))
					<div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
				@endif
				{{ Form::open(array('url' => '/login','class'=>'form-signin','id'=>'apollo-login-form')) }}
					<div class="form-group">
						{{ Form::label('lblusername', 'Nombre de Usuario', array('class' => 'control-label')); }}
						{{ Form::text('username', Input::old('username'),array('class' => 'form-control')); }}
					</div>
					<div class="form-group">
						{{ Form::label('contraseña', 'Contraseña',array('class' => 'control-label')) }}
						{{ Form::password('password',array('class' => 'form-control')); }}
					</div>
					{{ Form::label('lblRememberme', 'Recordar contraseña') }}
					{{ Form::checkbox('rememberme', true,array('class' => 'form-control')) }}
					<br>
					<br>
					{{ Form::submit('Ingresar',array('class' => 'btn btn-lg btn-signin btn-block')) }}
				{{ Form::close() }}

			</div>
		</div>
	</div>
</body>
</html>