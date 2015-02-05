
<div class="apollo">
	<div class="apollo-container clearfix">
		<div class="apollo-facebook" align="center">
		<h3>Esta seguro que desea Eliminar el Usuario..?</h3><hr>
		</div>
		<div class="apollo-login">
			<div id="messaje"> </div>
			{{ Form::button('Eliminar',array('class' => 'btn btn-lg btn-signin btn-block','onclick'=>'DeletePerfil('.$id.');')) }}
		</div>
	</div>
</div>
