@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3>
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
		{!!Form::open(array('url'=>'compras/proveedor', 'method'=>'POST', 'autocomplete'=>'off'))!!}
		{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre del proveedor...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="tipo_documento">Tipo de documento</label>
				<select name="tipo_documento" class="form-control">
					<option value="DNI">DNI</option>
					<option value="LC">LC</option>
					<option value="LR">LR</option>
					<option value="CC">CC</option>
					<option value="CUIT">CUIT</option>
					<option value="CUIL">CUIL</option>
					<option value="RUC">RUC</option>
					<option value="Pasaporte">Pasaporte</option>
				</select>
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
			<label for="codigo">Número de Documento</label>
			<input type="text" name="num_documento" class="form-control" placeholder="Número de documento..." required value="{{old('num_documento')}}">
		</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
			<label for="direccion">Direccion</label>
			<input type="text" name="direccion" class="form-control" placeholder="Direccion del proveedor..." value="{{old('direccion')}}">
			</div>
		</div>
		
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="telefono">Teléfono</label>
			<input type="tel" name="telefono" class="form-control" placeholder="Número telefónico..." value="{{old('telefono')}}">
		</div>
	</div>
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" class="form-control" placeholder="Correo electrónico" value="{{old('email')}}">
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