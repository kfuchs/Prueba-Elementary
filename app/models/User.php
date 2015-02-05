<?php


use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use \NEkman\ModelLogger\Contract\Logable;
use \NEkman\ModelLogger\Observer\Logger;
use \NEkman\ModelLogger\Model;
use Zizaco\Entrust\HasRole;


class User extends Eloquent implements 	 Logable, UserInterface, RemindableInterface  {

	use UserTrait, RemindableTrait, HasRole,Logable;

	protected $fillable = ['name', 'username','email','password'];

	protected $table = 'usuarios';

	protected $hidden = array('password', 'remember_token');

	public function getLogName() {
		return $this->username;
	}

}
