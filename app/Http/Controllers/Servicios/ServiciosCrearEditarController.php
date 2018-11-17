<?php
//JAP 24 10 2018, Controlador de la vista para adicion y edicion de un servicio 
namespace App\Http\Controllers\Servicios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Servicios\Servicios;
use App\Http\Requests\Servicios\CrearEditarServicioRequest;

class ServiciosCrearEditarController extends Controller
{
	//JAP 24 10 2018 , Metodo que despliega la vista 
    public function show($id){

        //indicador de accion
        $crear= false;

        //si id es 0 quiere decir que es un crear, si es diferente de 0 es un editar
    	if($id != 0){

            
            //busca el servicio en DB
	    	$servicio= Servicios::find($id);

	    	return view ('servicios.ServiciosCrearEditar',[
	    		'servicio'=>$servicio,
                'crear'=>$crear
	    	]);

    	}else{
          
            //Crea el servicio vacio
            $servicio = new Servicios;
            $crear = true;

            return view ('servicios.ServiciosCrearEditar',[
	    		'servicio'=>$servicio,
                'crear'=>$crear
	    	]); 


    	}
    }

    //JAP 24 10 2018 , Crea o edita un servicio
    public function crearEditar(CrearEditarServicioRequest $pServicio){


        //Si no tiene id quiere decir que es un crear , de lo contrario  es un editar
        if($pServicio -> input('id') ==null) {

            try{

                //$objServicio = Servicios :: create([
                $objServicio = Servicios::create([
                'codigo' => trim($pServicio -> input('codigo')), 
                'nombre' => trim($pServicio -> input('nombre')),
                'descripcion' =>trim($pServicio -> input('descripcion'))  
                ]);

                return redirect ('/home/servicios/listar');

            }catch(\Exception $e){

                return $e;
            }
          
        }else{

            //se busca el servicio
            $objServicio= Servicios::find($pServicio -> input('id'));
         
            //se llenan los campos del servicio
            $objServicio->codigo = trim($pServicio -> input('codigo'));   
            $objServicio->nombre =trim( $pServicio -> input('nombre'));
            $objServicio->descripcion = trim($pServicio -> input('descripcion'));

            $objServicio->save();

            return redirect ('/home/servicios/listar');
        }
    }

    //JAP 24 10 2018 , Elimina un servicio
    public function eliminar($pId){

        Servicios::destroy($pId);

        return redirect ('/home/servicios/listar');


    }
}
