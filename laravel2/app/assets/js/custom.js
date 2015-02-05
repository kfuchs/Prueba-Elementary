$(function() {
	$(document).on('click', '#inicio', function(event) {
		$('#contenido').slideUp('slow', function(){
			$('#contenido').load('vendedor/lista.blade.php','' ,function(){
				$('#contenido').slideDown('slow');
			});
		});
		return false;
	});
});