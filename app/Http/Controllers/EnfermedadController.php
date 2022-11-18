<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnfermedadRequest;
use App\Http\Requests\UpdateEnfermedadPruebaLaboratorioRequest;
use App\Http\Requests\UpdateEnfermedadPruebaPostMortemRequest;
use App\Http\Requests\UpdateEnfermedadRequest;
use App\Http\Requests\UpdateEnfermedadSignoRequest;
use App\Http\Requests\UpdateEnfermedadSintomaRequest;
use App\Http\Requests\UpdateEnfermedadTratamientoRequest;
use App\Models\Enfermedad;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermedades = Enfermedad::all();
        return view('enfermedades.enfermedades-index', compact('enfermedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enfermedades.enfermedades-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnfermedadRequest $request)
    {
        $enfermedadData = $request->safe()->only(['nombre', 'descripcion']);
        Enfermedad::create($enfermedadData);
        
        return redirect()->route('enfermedades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function show(Enfermedad $enfermedade)
    {
        return view('enfermedades.enfermedades-show', compact('enfermedade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Enfermedad $enfermedade)
    {
        return view('enfermedades.enfermedades-form', compact('enfermedade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnfermedadRequest $request, Enfermedad $enfermedade)
    {
        $enfermedadData = $request->safe()->only(['nombre', 'descripcion']);
        Enfermedad::where('id', $enfermedade->id)->update($enfermedadData);

        return redirect()->route('enfermedades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enfermedad $enfermedade)
    {
        $enfermedade->delete();
        return redirect()->route('enfermedades.index');
    }

    public function editTratamiento(Enfermedad $enfermedade)
    {
        return view('enfermedades.enfermedades-form-tratamiento', compact('enfermedade'));
    }

    public function updateTratamiento(UpdateEnfermedadTratamientoRequest $request, Enfermedad $enfermedade)
    {
        $enfermedade->tratamientos()->sync($request->input('tratamientos', []));

        return redirect()->route('enfermedades.show', $enfermedade);
    }

    public function editSigno(Enfermedad $enfermedade)
    {
        return view('enfermedades.enfermedades-form-signo', compact('enfermedade'));
    }

    public function updateSigno(UpdateEnfermedadSignoRequest $request, Enfermedad $enfermedade)
    {
        $enfermedade->signos()->sync($request->input('signos', []));

        return redirect()->route('enfermedades.show', $enfermedade);
    }

    public function editSintoma(Enfermedad $enfermedade)
    {
        return view('enfermedades.enfermedades-form-sintoma', compact('enfermedade'));
    }

    public function updateSintoma(UpdateEnfermedadSintomaRequest $request, Enfermedad $enfermedade)
    {
        $enfermedade->sintomas()->sync($request->input('sintomas', []));

        return redirect()->route('enfermedades.show', $enfermedade);
    }

    public function editPruebaLaboratorio(Enfermedad $enfermedade)
    {
        return view('enfermedades.enfermedades-form-prueba-laboratorio', compact('enfermedade'));
    }

    public function updatePruebaLaboratorio(UpdateEnfermedadPruebaLaboratorioRequest $request, Enfermedad $enfermedade)
    {
        $enfermedade->pruebasLaboratorio()->sync($request->input('pruebas', []));

        return redirect()->route('enfermedades.show', $enfermedade);
    }

    public function editPruebaPostMortem(Enfermedad $enfermedade)
    {
        return view('enfermedades.enfermedades-form-prueba-post-mortem', compact('enfermedade'));
    }

    public function updatePruebaPostMortem(UpdateEnfermedadPruebaPostMortemRequest $request, Enfermedad $enfermedade)
    {
        $enfermedade->pruebasPostMortem()->sync($request->input('pruebas', []));

        return redirect()->route('enfermedades.show', $enfermedade);
    }
}
