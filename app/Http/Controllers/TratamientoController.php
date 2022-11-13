<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTratamientoRequest;
use App\Http\Requests\UpdateTratamientoRequest;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return view('tratamientos.tratamientos-index', compact('tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tratamientos.tratamientos-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTratamientoRequest $request)
    {
        $tratamientoData = $request->safe()->only(['nombre', 'descripcion', 'modo_uso']);
        Tratamiento::create($tratamientoData);
        
        return redirect()->route('tratamientos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Tratamiento $tratamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Tratamiento $tratamiento)
    {
        return view('tratamientos.tratamientos-form', compact('tratamiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTratamientoRequest $request, Tratamiento $tratamiento)
    {
        $tratamientoData = $request->safe()->only(['nombre', 'descripcion', 'modo_uso']);
        Tratamiento::where('id', $tratamiento->id)->update($tratamientoData);

        return redirect()->route('tratamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tratamiento $tratamiento)
    {
        $tratamiento->delete();
        return redirect()->route('tratamientos.index');
    }
}
