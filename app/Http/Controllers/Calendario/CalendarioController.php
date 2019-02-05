<?php

namespace App\Http\Controllers\Calendario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarioController extends Controller
{
    public function showCalendario(){
    	return view ('calendario.calendario');
    }

}
