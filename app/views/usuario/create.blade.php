
<div class="apollo">
	<div class="apollo-container clearfix">
		<div class="apollo-facebook" align="center">
			<h3>Perfil</h3><hr>
		</div>
		<div id="messaje"> </div>
		{{ Form::open(array('url' => '/usuario/create','class'=>'form-signin','id'=>'formPerfil','name'=>'perfil_create')) }}
		{{ Form::hidden('id', 0) }}
		{{Form::_input('username','Usuario','','text','form-control','')}}
		{{Form::_input('name','Nombre','','text','form-control','')}}
		{{Form::_input('email','Correo Electronico','@','text','form-control','')}}
		{{Form::_input('password','Password','','password','form-control','')}}
		{{Form::_input('crear','','Crear Usuario','button','btn btn-lg btn-signin btn-block','newPerfil();')}}
		{{ Form::close() }}

	</div>


</div>
