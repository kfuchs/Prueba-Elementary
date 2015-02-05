
<div class="apollo">
	<div class="apollo-container clearfix">
		<div class="apollo-facebook" align="center">
			<h3>Perfil</h3><hr>
		</div>
		

		<div id="messaje"> </div>
		{{ Form::open(array('url' => '/usuario/edit','class'=>'form-signin','id'=>'formPerfil','name'=>'perfil_update')) }}
		<table width="100%" 	><tr>
			<td width="350">
				{{ Form::hidden('id', $user->id) }}
				{{ Form::_input('username','Usuario',$user->username,'text','form-control','') }}
				{{ Form::_input('name','Nombre',$user->name,'text','form-control','') }}
				{{ Form::_input('email','Correo',$user->email,'text','form-control','') }}
				{{ Form::_input('password','Password','','password','form-control','') }}
				{{ Form::_input('Actualizar','','Actualizar','button','btn btn-lg btn-signin btn-block','UpdatePerfil();') }}
			</td>
			<td width="100"></td>
			<td width="300" style="vertical-align:top;" >
				<label for="roles">Roles</label> 
				<div class="form-group">
					<table><tr>
						<td><input type="button" value="+" onclick="addRol({{$user->id}})" style=" 
							font-size: 16px; height: 40px; margin-bottom: 15px;padding: 4px 5px;}"></td>
							<td width="350"><select id="RolAdd" class="form-control" style=" border-color: rgba(140, 168, 41, 0.8);outline: 0px none;box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(140, 168, 41, 0.6);font-size: 16px;height: 40px;margin-bottom: 15px; padding: 7px 9px;
							}">
							@foreach($roles as $rol)
							<option name="{{$rol->id}}">{{$rol->name}}</option>
							@endforeach
						</select></td>
					</tr>

					<tr>

						<td colspan="2">
						<hr>
							<table>
								@foreach($asigned as $as)
								<tr style="vertical-align:top;" >
								<td><button type="button" value="" onclick="delRol({{$user->id}},{{$as->id}})" style=" 
										font-size: 16px; height: 40px; margin-bottom: 15px;padding: 4px 5px;}">-</button> </td>
										<td width="350">
										<input type="button" class="form-control" disabled="disabled" value="{{$as->name}}" style=" 
										font-size: 16px; height: 40px; margin-bottom: 15px;padding: 4px 5px;}">
									</td>
								</tr>
								@endforeach
							</table>

						</div>
					</td>
				</tr></table>
				{{ Form::close() }}

			</div>
		</div>
