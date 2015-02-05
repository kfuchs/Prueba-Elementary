
toastr.options = {
  "closeButton": true,
  "progressBar": true,
  "positionClass": "toast-bottom-full-width",
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "2500",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
function EditPerfil($id){
    $.ajax({
        type: "POST",
        url: "/usuario/edit",
        data: {id: $id},
        contentType: 'application/x-www-form-urlencoded',
        success: function (data) {
            $('#perfil').html(data);
            $('#perfil').modal('show');
            toastr[data.tipo](data.mensaje,"PERFIL");
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });
};

function createPerfil(){
	$.get('/usuario/create', function(data) {
		$('#perfil').html(data);
		$('#perfil').modal('show');
        toastr[data.tipo](data.mensaje,"PERFIL");
         
	});
}
function UpdatePerfil(){
	var datos=$('#formPerfil').serialize();
	$.ajax({
		type: "POST",
		url: $('#formPerfil').attr('action'),
		data: datos,
        contentType: 'application/x-www-form-urlencoded',
		success: function(data) {
            toastr[data.tipo](data.mensaje,"PERFIL");
		}
	});
	return false;
}
function newPerfil(){
	var datos=$('#formPerfil').serialize();
	$.ajax({
		type: "POST",
		url: $('#formPerfil').attr('action'),
		data: datos,
        contentType: 'application/x-www-form-urlencoded',
		success: function(data) {
			toastr[data.tipo](data.mensaje,"PERFIL");
		}
	});
	return false;
}
function CargarLista(){
	$.get('/usuario/cargar', function(data) {
		$('#contenedor').html(data);
        toastr[data.tipo](data.mensaje);
	});
}
function CargarConsulta(){
    $.get('/consulta', function(data) {
        $('#contenedor').html(data);
        toastr[data.tipo](data.mensaje);
    });
}

function CargarConsulta2(){
    $.get('/consulta2', function(data) {
        $('#contenedor').html(data);
        toastr[data.tipo](data.mensaje);0
    });
}
function DeleteConfirm($id)
{
	$.ajax({
        type: "POST",
        url: "/usuario/cargar",
        data: {id: $id},
        contentType: 'application/x-www-form-urlencoded',
        success: function (data) {
            $('#perfil').html(data);
            $('#perfil').modal('show');
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });
}
function DeletePerfil($id){
	$.ajax({
        type: "POST",
        url: "/usuario/delete",
        data: {id: $id},
        contentType: 'application/x-www-form-urlencoded',
        success: function (data) {
            toastr[data.tipo](data.mensaje);
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });
}
function addRol($id){
     $name=$('#RolAdd').val();
    $.ajax({
        type: "POST",
        url: "/usuario/addRol",
        data: {id: $id,name: $name},
        contentType: 'application/x-www-form-urlencoded',
        success: function (data) {
            toastr[data.tipo](data.mensaje);
            EditPerfil($id);
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });
}
function delRol($id,$name){
    $.ajax({
        type: "POST",
        url: "/usuario/delRol",
        data: {id: $id,name: $name},
        contentType: 'application/x-www-form-urlencoded',
        success: function (data) {
            toastr[data.tipo](data.mensaje);
            EditPerfil($id);
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });
}

