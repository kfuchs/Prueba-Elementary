<?php
use ValidatorAssistant;

class UserController extends BaseController {

	function create(){
		return View::make('usuario.create');
	}
	function create_new(){
		$user =  new User();
		$userValidator = UserValidator::make(Input::all());
		if ($userValidator->fails()) 
		{
			$mensaje=array('tipo' => 'error','mensaje'=>$userValidator->messages()->first());
			return $mensaje;
		}
		else
		{
			$user->username = Input::get('username');
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			User::observe(new \NEkman\ModelLogger\Observer\Logger);
			$user->save();
			$mensaje=array('tipo' => 'success','mensaje'=>'Usuario Creado..!' );
			return $mensaje;
		}
	}

	function update(){
		$id=Input::get('id');
		if(Input::get('_token') == null){
			//roles no asignados
			$roles=DB::table('roles') 
			->WhereNotExists(function($query)
				{ $query->select(DB::raw(1))->from('assigned_roles')
				->whereRaw('roles.id = assigned_roles.role_id')
				->whereRaw('assigned_roles.user_id = '.Input::get('id'));})->get();
			//roles asignados
			$asigned=DB::table('roles') ->whereExists(function($query)
				{ $query->select(DB::raw(1))->from('assigned_roles')
				->whereRaw('roles.id = assigned_roles.role_id')
				->whereRaw('assigned_roles.user_id = '.Input::get('id'));})->get();

			
			$users = User::find($id);
			return View::make('usuario.edit',array('user'=> $users,'roles'=>$roles,'asigned'=>$asigned));
		}

		$user = User::find($id);
		$userValidator = UserValidator::make(Input::all());
		

		if ($userValidator->fails()) 
		{
			$mensaje=array('tipo' => 'error','mensaje'=>$userValidator->messages()->first());
			return $mensaje;
		}
		else
		{
			$user->username = Input::get('username');
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			if (Input::get('password')!=null) 
			{
				$user->password = Hash::make(Input::get('password'));
			}
			User::observe(new \NEkman\ModelLogger\Observer\Logger);
			$user->save();
			

			$mensaje=array('tipo' => 'success','mensaje'=>'Usuario Actualizado..!' );
			return $mensaje;
		}
	}

	function cargar(){
		$users =  User::all();
		return View::make('usuario.list',array('users'=> $users));
	}

	function confirm(){
		$id=Input::get('id');
		return View::make('usuario.delete')->with('id',$id);
	}
	
	function delete()
	{
		$id=Input::get('id');
		$user = User::find($id);
		User::observe(new \NEkman\ModelLogger\Observer\Logger);

		$user->delete();

		$mensaje=array('tipo' => 'success','mensaje'=>'Usuario Eliminado..!' );
		return $mensaje;
	}

	function table()
	{
		$table_data =new Table(DB::connection('mysql')->getPdo());
		$editable = true;
		$table = 'usuarios';
		$columns = array("name","email","username","created_at","updated_at");
		$Searchable_columns = array("name","email","username");
		$Join = '';
		$table_data->get($editable, $table, $columns, $Searchable_columns, $Join);
	}

	function addRol(){
		$id=Input::get('id');
		$rol=Input::get('name');
		$idRol=DB::table('roles')->where('name', '=', $rol)->get();
		$rolid=0;
		foreach($idRol as $data){ $rolid=$data->id;}
		if ($rol==null) {
			$mensaje=array('tipo' => 'warning','mensaje'=>'sin Asignar..!' );
			return $mensaje;
		}

		DB::table('assigned_roles')->insert(array('user_id' => $id, 'role_id' => $rolid));

		$mensaje=array('tipo' => 'success','mensaje'=>'Rol Asignado..!' );
		return $mensaje;
	}
	function delRol(){
		DB::table('assigned_roles')
            ->where('user_id', '=',Input::get('id'))
            ->where('role_id', '=', Input::get('name'))->delete();

		$mensaje=array('tipo' => 'success','mensaje'=>'Rol Eliminado..!' );
		return $mensaje;
	}


}