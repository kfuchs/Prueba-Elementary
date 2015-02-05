
	<div align="center">
	<h1>Eloquent</h1>
		<div class="apollo-table">
			<div class="apollo-container clearfix">
				<table class="table table-hover">
					<tbody>
						<tr>
							<td>CODIGO</td>
							<td>NOMBRE</td>
							<td>MARCA</td>
							<td>PRECIO</td>
							<td>CANTIDAD</td>
							<td>TOTAL</td>
							<td>PROVEEDOR</td>
							<td>USUARIO</td>
						</tr>
					</tbody>
					@foreach($mostrar2 as $com)
						@foreach($com->Detalle as $det)
						<tr>
							<td> {{$det->Productos->codigo}}</td>
							<td> {{$det->Productos->nombre}}</td>
							<td> {{$det->Productos->Marcas->descripcion}}</td>
							<td>Q {{$det->precio}}</td>
							<td>{{$det->cantidad}}</td>
							<td>Q {{$det->total}}</td>
							<td> {{$com->Proveedor->nombre}}</td>
							<td> {{$com->Usuarios->name}}</td>
						@endforeach
					@endforeach
				</table>
				<strong>Total Comprado: <p style="font-size:18px;">Q {{$com->total}}</p>
				</div>
			</div>
		</div>
