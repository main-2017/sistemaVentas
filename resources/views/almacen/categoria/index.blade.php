@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Categorías <a href="categoria/create"><button>Nuevo</button></a></h3>
			<h4>Hola Ariel</h4>
			@include('almacen.categoria.search')
		</div>
	</div>

	<div class="row">
		
	</div>
@endsection