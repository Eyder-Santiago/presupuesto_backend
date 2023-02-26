<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//importamos el modelo
use App\Models\Egreso;

class EgresoController extends Controller
{



    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //El método index es el inicio de las rutas, es donde mostraremos el listado de todos los egresos.
        $query = Egreso::query();
        if ($request->has('param')) {
            $query->where('nombre', 'like', "%" . $request->get("param") . "%");
        }

        return $query->get()->toJson();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *@param  \Illuminate\Http\Request  $request
     *@return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //El método store almacena un nuevo alumno, la variable $request contiene todos los datos del formulario en la
        //petición http. El método all() carga los datos al objeto $egreso. El método save() se encarga de guardar los 
        //datos en la base de datos, por último retorna a la vista del listado de alumnos.
        $retorno = json_decode($request->getContent());

        $egreso = new Egreso();
        $egreso->fill((array)$retorno);
        $egreso->descripcion = $retorno->descripcion;
        $egreso->valor = $retorno->valor;

        $egreso->save();
        $retorno->recibido = "OK";
        return response()->json($retorno);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Egreso $egreso)
    {
        $retorno = json_decode($request->getContent());
        $egreso->fill((array)$retorno);
        $egreso->descripcion = $retorno->descripcion;
        $egreso->valor = $retorno->valor;

        $egreso->save();
        $egreso->recibido = "OK";
        return response()->json($retorno);
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Ingreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egreso $egreso)
    {
        $egreso->delete();
    }
}
