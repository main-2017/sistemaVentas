<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model //Se crea la clase Persona que extiende a la clase Model de Laravel
{
   
    protected $table ='persona'; //Nombre de la tabla a la que el modelo hace referencia
    protected $primaryKey ='idpersona'; //Clave primaria de la tabla referenciada
    public $timestamps=false;
    protected $fillabel =[ //Array con los campos de la tabla referenciada menos su PK
    	'tipo_persona',
    	'nombre',
    	'tipo_documento',
    	'num_documento',
    	'direccion',
    	'telefono',
    	'email'
    ];

    protected $guared =[];
}
