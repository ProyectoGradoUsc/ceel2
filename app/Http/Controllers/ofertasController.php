<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;

class ofertasController extends Controller
{
    protected $request;

	public function __construct(Request $request){
		$this->request = $request;
		$this->middleware('ceel');
	}


    public function showOfertas(){

    	$allOfertas = DB::table('cursos')->get();
    	return view ('ofertas/listarOfertas', compact('allOfertas'));
    }

    public function showCreateOfertas(){
/*
        $curso = "";
        if ($idOferta != 0){
            $curso = DB::table('cursos')->where('id', $idOferta)->get();
        }*/
        
        $servicios = DB::table('servicios')->get();
        $temas = DB::table('temas')->get();
        $profesores = DB::table('profesores')->get();
    	return view ('ofertas/ofertas', compact('servicios','temas', 'profesores', 'curso'));
    }


    public function createOferta(){

        $this->validate($this->request,[
            'codigo' => 'required',
            'nombreServicio' => 'required',
            'servicio' => 'required',
            'tema' => 'required',
            'responsable' => 'required',
            'nombreSolicitante' => 'required',
            'cupo' => 'required',
            'ubicacion' => 'required',
            'salon' => 'required',
            'fecha' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
            'descripcion' => 'required'
        ]);

        $ponencia = 0;
        if ($this->request->input('ponencia')[0] == 1){
            $ponencia =1;
        }


        DB::table('cursos')->insert([
            "codigo" => $this->request->input('codigo'),
            "nomServicio" => $this->request->input('nombreServicio'),
            "idServicio" => $this->request->input('servicio'),
            "idTema" => $this->request->input('tema'),
            "idResponsable" => $this->request->input('responsable'),
            "nomSolicitante" => $this->request->input('nombreSolicitante'),
            "cupo" => $this->request->input('cupo'),
            "ponencia" => $ponencia,
            "ubicacion" => $this->request->input('ubicacion'),
            "salon" => $this->request->input('salon'),
            "fechaCurso" => $this->request->input('fecha'),
            "horaInicioCurso" => $this->request->input('horaInicio'),
            "horaFinCurso" => $this->request->input('horaFin'),
            "descripcion" => $this->request->input('descripcion'),
            //"createdAt" => Carbon::now(),
            //"updatedAt" => Carbon::now()


        ]);
        return redirect('listarOfertas');
        //return back()->with('info','has creado un nuevo tema correctamente.');
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

    public function deleteOferta($idOferta){

    	DB::table('cursos')->where('id', $idOferta)->delete();
    	return redirect('listarOfertas');
    	
    }

    
}
