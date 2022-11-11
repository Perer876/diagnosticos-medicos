<?php

namespace App\Http\Controllers;

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
        $pruebas_lab = PruebaLaboratorio::all();
        return redirect();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PruebaLaboratorio  $pruebaLaboratorio
     * @return \Illuminate\Http\Response
     */
    public function show(PruebaLaboratorio $pruebaLaboratorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PruebaLaboratorio  $pruebaLaboratorio
     * @return \Illuminate\Http\Response
     */
    public function edit(PruebaLaboratorio $pruebaLaboratorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PruebaLaboratorio  $pruebaLaboratorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PruebaLaboratorio $pruebaLaboratorio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PruebaLaboratorio  $pruebaLaboratorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(PruebaLaboratorio $pruebaLaboratorio)
    {
        //
    }
}
