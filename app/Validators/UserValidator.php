<?php

use ValidatorAssistant;

class UserValidator extends ValidatorAssistant {

	protected $rules = array(
		'username' => 'required|min:3|max:10|unique:usuarios,id,{id}',
		'name' => 'required|min:5',
		'email' => 'required|email|unique:{id}',
		'password' => 'min:3'
		);

	protected function before()
	{
		$id=Input::get('id');
		if($id>0)
		{
			$this->bind('id',$id);
		}else{
			$this->bind('id','usuarios');
		}
	}
		

}