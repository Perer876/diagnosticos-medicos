<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Models\EstadoCita;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Paciente $paciente)
    {
        dd($paciente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente)
    {
        return view('citas.cita-form', compact('paciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCitaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCitaRequest $request, Paciente $paciente)
    {
        $validated = $request->safe()->merge([
            'paciente_id' => $paciente->id,
            'estado_cita_id' => EstadoCita::id('Pendiente')
        ]);

        Cita::create($validated->all());

        return redirect()->route('pacientes.show', $paciente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        return view('citas.cita-show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        $paciente = $cita->paciente;
        return view('citas.cita-form', compact('paciente', 'cita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCitaRequest  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCitaRequest $request, Cita $cita)
    {
        $validated = $request->safe()->all();

        $cita->user_id = $validated['user_id'];
        $cita->motivo = $validated['motivo'];
        $cita->fecha = $validated['fecha'];
        $cita->hora = $validated['hora'];

        $cita->save();

        return redirect()->route('citas.show', $cita);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();

        return to_route('pacientes.show', $cita->paciente);
    }

    public function cambioEstado(Request $request, Cita $cita)
    {
        $validated = $request->validate([
            'estado_cita' => ['required', 'numeric', Rule::exists('estados_cita', 'id')],
        ]);

        $cita->estado_cita_id = $validated['estado_cita'];
        $cita->save();

        return to_route('citas.show', $cita);
    }
}
