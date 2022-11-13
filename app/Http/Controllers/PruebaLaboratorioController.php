<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePruebaLaboratorioRequest;
use App\Http\Requests\UpdatePruebaLaboratorioRequest;
use App\Models\PruebaLaboratorio;
use Illuminate\Http\Request;

class PruebaLaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pruebasLaboratorio = PruebaLaboratorio::all();
        return view('pruebas_laboratorio.pruebas-index', compact('pruebasLaboratorio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pruebas_laboratorio.pruebas-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePruebaLaboratorioRequest $request)
    {
        $pruebaData = $request->safe()->only(['nombre', 'descripcion']);
        PruebaLaboratorio::create($pruebaData);
        
        return redirect()->route('pruebas_laboratorio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PruebaLaboratorio  $pruebaLaboratorio
     * @return \Illuminate\Http\Response
     */
    public function show(PruebaLaboratorio $pruebas_laboratorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PruebaLaboratorio  $pruebaLaboratorio
     * @return \Illuminate\Http\Response
     */
    public function edit(PruebaLaboratorio $pruebas_laboratorio)
    {
        return view('pruebas_laboratorio.pruebas-form', compact('pruebas_laboratorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PruebaLaboratorio  $pruebaLaboratorio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePruebaLaboratorioRequest $request, PruebaLaboratorio $pruebas_laboratorio)
    {
        $pruebaData = $request->safe()->only(['nombre', 'descripcion']);
        PruebaLaboratorio::where('id', $pruebas_laboratorio->id)->update($pruebaData);

        return redirect()->route('pruebas_laboratorio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PruebaLaboratorio  $pruebaLaboratorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(PruebaLaboratorio $pruebas_laboratorio)
    {
        $pruebas_laboratorio->delete();        
        return redirect()->route('pruebas_laboratorio.index');
    }
}
