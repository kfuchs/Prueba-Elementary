<?php

Form::macro('_input', function($nombre,$placeholder,$values,$tipo,$clase,$onclick)
{
	$input='<div class="form-group">
	<label for="'.$nombre.'">'.$placeholder.'</label> 
	<input type="'.$tipo.'" class="'.$clase.'" name="'.$nombre.'" placeholder="'.$placeholder.'" value="'.$values.'" onclick="'.$onclick.'"></div>';
	return $input;
});
