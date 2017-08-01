@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col md-6 col-sm-6 col-xs-12">
			<h3>Editar Proveedor: {{$persona->nombre}}</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif		
		</div>	
	</div>

	{!!Form::model($persona, ['method'=>'PATCH', 'route'=>['compras.proveedor.update', $persona->idpersona]])!!}
	{{Form::token()}}
		<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
			<label for="direccion">Direccion</label>
			<input type="text" name="direccion" class="form-control" value="{{$persona->direccion}}">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
			<label for="tipo_documento">Tipo de documento</label>
				<select name="tipo_documento" class="form-control">
				@if($persona->tipo_documento=='DNI')
					<option value="DNI" selected>DNI</option>
					<option value="LC">LC</option>
					<option value="LR">LR</option>
					<option value="CC">CC</option>
					<option value="CUIT">CUIT</option>
					<option value="CUIL">CUIL</option>
					<option value="RUC">RUC</option>
					<option value="Pasaporte">Pasaporte</option>
				@elseif($persona->tipo_documento=='LC')
					<option value="LC" selected>LC</option>
					<option value="DNI">DNI</option>
					<option value="LR">LR</option>
					<option value="CC">CC</option>
					<option value="CUIT">CUIT</option>
					<option value="CUIL">CUIL</option>
					<option value="RUC">RUC</option>
					<option value="Pasaporte">Pasaporte</option>
				@elseif($persona->tipo_documento== 'LR')
					<option value="LR" selected>LR</option>
					<option value="DNI">DNI</option>
					<option value="LC">LC</option>
					<option value="CC">CC</option>
					<option value="CUIT">CUIT</option>
					<option value="CUIL">CUIL</option>
					<option value="RUC">RUC</option>
					<option value="Pasaporte">Pasaporte</option>
				@elseif($persona->tipo_documento== 'CC')
					<option value="CC" selected>CC</option>
					<option value="DNI">DNI</option>
					<option value="LC">LC</option>
					<option value="LR">LR</option>
					<option value="CUIT">CUIT</option>
					<option value="CUIL">CUIL</option>
					<option value="RUC">RUC</option>
					<option value="Pasaporte">Pasaporte</option>
				@elseif($persona->tipo_documento== 'CUIT')
					<option value="CUIT" selected>CUIT</option>
					<option value="DNI">DNI</option>
					<option value="LC">LC</option>
					<option value="LR">LR</option>
					<option value="CC">CC</option>
					<option value="CUIL">CUIL</option>
					<option value="RUC">RUC</option>
					<option value="Pasaporte">Pasaporte</option>
				@elseif($persona->tipo_documento== 'CUIL')
					<option value="CUIL" selected>CUIL</option>
					<option value="DNI">DNI</option>
					<option value="LC">LC</option>
					<option value="LR">LR</option>
					<option value="CC">CC</option>
					<option value="CUIT">CUIT</option>
					<option value="RUC">RUC</option>
					<option value="Pasaporte">Pasaporte</option>
				@elseif($persona->tipo_documento == 'RUC')
					<option value="RUC" selected>RUC</option>
					<option value="DNI">DNI</option>
					<option value="LC">LC</option>
					<option value="LR">LR</option>
					<option value="CC">CC</option>
					<option value="CUIT">CUIT</option>
					<option value="CUIL">CUIL</option>
					<option value="Pasaporte">Pasaporte</option>
				@else
					<option value="Pasaporte" selected>Pasaporte</option>
					<option value="DNI">DNI</option>
					<option value="LC">LC</option>
					<option value="LR">LR</option>
					<option value="CC">CC</option>
					<option value="CUIT">CUIT</option>
					<option value="CUIL">CUIL</option>
					<option value="RUC">RUC</option>
				@endif
				</select>
		</div>	
		</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="num_documento">Número de Documento</label>
			<input type="text" name="num_documento" value="{{$persona->num_documento}}" class="form-control">
		</div>
	</div>
		
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="telefono">Teléfono</label>
			<input type="tel" name="telefono" class="form-control" value="{{$persona->telefono}}">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" class="form-control" value="{{$persona->email}}">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Guardar</button>
			<button type="reset" class="btn btn-danger">Cancelar</button>
		</div>
	</div>
	</div>
	{!!Form::close()!!}


	
@endsection