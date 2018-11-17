<?php 
//Controlador de  pagina principal en modulo servicios 
namespace App\Http\Controllers\Servicios ;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiciosController extends Controller
{
    public function show(){
    	return view ('Servicios.Servicios');
    }
}
	