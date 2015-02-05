<?php

class UserTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'username'  => 'alberto',
            'email'     => 'alberto.madrid@hotmail.com',
            'name'=> 'Administrador',
            'password' => Hash::make('12345') 
        ));
    }
}