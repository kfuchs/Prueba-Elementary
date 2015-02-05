<?php

class AuthController extends BaseController {

	public function showLogin()
	{
		if (Auth::check())
		{
			return Redirect::to('/');
		}
		return View::make('login');
	}

	public function postLogin()
    {
        $userdata = array(
            'username' => Input::get('username'),
            'password'=> Input::get('password')
        );
        if(Auth::attempt($userdata, Input::get('remember-me', 0)))
        {
            return Redirect::to('/');
        }
        return Redirect::to('login')
                    ->with('mensaje_error', 'Tus datos son incorrectos')
                    ->withInput();
    }

     public function logOut()
    {
        Auth::logout();
        return Redirect::to('login')
                    ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }
}