<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\Request;
use App\Http\Requests\PeliculasValidate;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pelicula=Peliculas::paginate(10);
        return view("crud.index",compact('pelicula'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("crud.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeliculasValidate $request)
    {
       
        $pelicula=new Peliculas();
        $pelicula->nombre_pelicula=$request->nombre_pelicula;
        $pelicula->descripcion_pelicula=$request->descripcion_pelicula;
        $pelicula->tipo_pelicula=$request->tipo_pelicula;
        $pelicula->fecha_estreno_pelicula=$request->fecha_estreno_pelicula;
        $pelicula->precio_pelicula=$request->precio_pelicula;
        if($pelicula->save()){
          return redirect('/peliculas');
        }else{
            return back();
        }

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peliculas=Peliculas::findOrFail($id);
       return response()->json($peliculas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelicula=Peliculas::findOrFail($id);
        $pelicula->nombre_pelicula=$request->nombre_pelicula;
        $pelicula->descripcion_pelicula=$request->descripcion_pelicula;
        $pelicula->tipo_pelicula=$request->tipo_pelicula;
        $pelicula->fecha_estreno_pelicula=$request->fecha_estreno_pelicula;
        $pelicula->precio_pelicula=$request->precio_pelicula;
        if($pelicula->save()){
          return response()->json(true);
        }else{
            return response()->json(true);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        if(Peliculas::destroy($id)){
            return response()->json(true);
        }else{
            return response()->json(false);
        }

    }
}
