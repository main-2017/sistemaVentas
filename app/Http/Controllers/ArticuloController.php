<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input; //Permite la subida de archivos de imágenes desde la máquina cliente al servidor

use sisVentas\Http\Requests\ArticuloFormRequest; //Hacemos referencia al request creado

use sisVentas\Articulo; //Hacemos referencia al modelo

use DB; //Llamamos al objeto que contiene la base de datos

class ArticuloController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$articulos=DB::table('articulo as a')
    		->join('categoria as c', 'a.idcategoria', '=', 'c.idcategoria') //Hacemos un join con la tabla relacionada
    		->select('a.idarticulo', 'a.nombre', 'a.codigo', 'a.stock', 'c.nombre as categoria', 'a.descripcion', 'a.imagen','a.estado') //Indico los campos que voy a necesitar mostrar de las dos tablas
    		->where('a.nombre', 'LIKE', '%'.$query.'%') //Realiza la busqueda dentro de los articulos
            ->orwhere('a.codigo', 'LIKE', '%'.$query.'%')
    		->orderBy('idarticulo', 'desc') //Ordena los articulos
    		->paginate(7);
    		return view('almacen.articulo.index', ["articulos"=>$articulos, "searchText"=>$query]); //Vista donde voy a mostrar el listado de articulos al hacer la busqueda
    	}
    }

    public function create(){
    	$categorias=DB::table('categoria')->where('condicion', '=', '1')->get(); //Elige todas las categorias activas y las envia a la vista de create para usarlas en un <select>
    	return view("almacen.articulo.create", ["categorias"=>$categorias]); //se envia a la vista el contenido de la varaiable $articulo como parametro
    }

    public function store(ArticuloFormRequest $request){
    	$articulo = new Articulo; //Creo un objeto de la clase Articulo
    	$articulo->idcategoria=$request->get('idcategoria'); //A partir de un formulario, mediante el método GET, obtengo el idcategoria (así se llama el campo del formulario)
    	$articulo->codigo=$request->get('codigo');
    	$articulo->nombre=$request->get('nombre');
    	$articulo->stock=$request->get('stock');
    	$articulo->descripcion=$request->get('descripcion');
    	$articulo->estado='Activo'; //Al crear un articulo, su estado será activo

    	if (Input::hasFile('imagen')) { //Verifica que exista una imagen que el usuario desee subir al servidor
    		$file=Input::file('imagen'); //En una variable guardamos la imagen
    		$file->move(public_path().'/imagenes/articulos/', $file->getClientOriginalName()); //Guardamos la imagen en una carpeta local, obteniendo ademas su nombre original
    		$articulo->imagen=$file->getClientOriginalName(); //En el objeto $articulo guardamos el nombre original de la imagen, es decir, su ruta
    	}

    	$articulo->save();
    	return Redirect::to('almacen/articulo'); //Al finalizar, redireccionamos al index del directorio articulo
    }

    public function show($id){
    	return view("almacen.articulo.show", ["articulo"=>Articulo::findOrFail($id)]);
    }

    public function edit($id){
    	$articulo=Articulo::findOrFail($id);
    	$categorias=DB::table('categoria')->where('condicion', '=', '1')->get();
    	return view("almacen.articulo.edit", ["articulo"=>$articulo, "categorias"=>$categorias]); //Envio el articulo y el listado de categorias a fin de poder editarlas
    }

    public function update(ArticuloFormRequest $request, $id){
    	$articulo = Articulo::findOrFail($id);
    	$articulo->idcategoria=$request->get('idcategoria'); //A partir de un formulario, mediante el método GET, obtengo el idcategoria (así se llama el campo del formulario)
    	$articulo->codigo=$request->get('codigo');
    	$articulo->nombre=$request->get('nombre');
    	$articulo->stock=$request->get('stock');
    	$articulo->descripcion=$request->get('descripcion');
    	
    	if (Input::hasFile('imagen')) { //Verifica que exista una imagen que el usuario desee subir al servidor
    		$file=Input::file('imagen'); //En una variable guardamos la imagen
    		$file->move(public_path().'/imagenes/articulos/', $file->getClientOriginalName()); //Guardamos la imagen en una carpeta local, obteniendo ademas su nombre original
    		$articulo->imagen=$file->getClientOriginalName(); //En el objeto $articulo guardamos el nombre original de la imagen, es decir, su ruta
    	}

    	$articulo->update();
    	return Redirect::to('almacen/articulo'); //El editar o eliminar un articulo, no enviamos una vista, sino que redireccionamos hacia el index del directorio
    }

    public function destroy($id){
		$articulo=Articulo::findOrFail($id);
		$articulo->estado='Inactivo';
		$articulo->update();
    	return Redirect::to('almacen/articulo');
    }
}
