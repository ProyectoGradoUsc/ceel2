<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;


class temasController extends Controller
{
	protected $request;

	public function __construct(Request $request){
		$this->request = $request;
		$this->middleware('ceel');
	}


    public function showTemas(){

    	$allTemas = DB::table('temas')->get();
    	return view ('temas/listarTemas', compact('allTemas'));
    }

    public function showCreateTemas(){
    	return view ('temas/temas');
    }

    public function showEditTemas($idTema){
    	$tema = DB::table('temas')->where('id',$idTema)->first();
    	return view ('temas/formEditTemas', compact('tema'));
    }

    public function editTema($idTema){

    	$this->validate($this->request,[
    		'nombre' => 'required',
    		'descripcion' => 'required'
    	]);

    	DB::table('temas')->where('id', $idTema)->update([
    		"nombre" => $this->request->input('nombre'),
    		"descripcion" => $this->request->input('descripcion'),
    	]);

    	return redirect('listarTemas');
    	
    }

    public function deleteTema($idTema){

    	DB::table('temas')->where('id', $idTema)->delete();
    	return redirect('listarTemas');
    	
    }

    public function createTema(){

    	$this->validate($this->request,[
    		'nombre' => 'required',
    		'descripcion' => 'required'
    	]);

    	DB::table('temas')->insert([
    		"nombre" => $this->request->input('nombre'),
    		"descripcion" => $this->request->input('descripcion'),
    	]);
    	return redirect('listarTemas');
    	//return back()->with('info','has creado un nuevo tema correctamente.');
    }
}
