{!! Form::open(array('url'=>'compras/ingreso', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search'))!!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="seachText" class="form-control" placeholder="Buscar..." value="{{$searchText}}">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</span>
		</div>
	</div>

{{Form::close()}}