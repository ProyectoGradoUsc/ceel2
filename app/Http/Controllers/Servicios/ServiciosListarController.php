<?php 
namespace App\Http\Controllers\Servicios;
//Controlador de la vista que muestra el listado de servicios


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Servicios\Servicios;

class ServiciosListarController extends Controller
{
	//JP 21/10/2018--Muestra la vista de la lista de servicios
    public function show(){

    	$servicios = Servicios :: all();

    	//dd($servicios);
     	return view ('Servicios.serviciosListar',[
     		'servicios'=>$servicios
     	]);
    }
}
