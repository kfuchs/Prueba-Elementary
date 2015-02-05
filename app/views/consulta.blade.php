
	<div align="center">
	<h1>Query Builder</h1>
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
					@foreach($mostrar as $data)
					<tr>
						<td>{{$data->codigo}}</td>
						<td>{{$data->nombre}}</td>
						<td>{{$data->descripcion}}</td>
						<td>Q {{$data->precio}}</td>
						<td>{{$data->cantidad}}</td>
						<td>Q {{$data->total}}</td>
						<td>{{$data->proveedor}}</td>
						<td>{{$data->name}}</td>
					</tr>
					@endforeach
				</table>
				<strong>Total Comprado: <p style="font-size:18px;">Q {{$data->compra}}</p>
				</div>
				

			</div>
		</div>
