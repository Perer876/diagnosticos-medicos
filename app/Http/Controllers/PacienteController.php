<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePacienteRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\{Paciente, Direccion, Identificacion};
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.pacientes-index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pacientes.paciente-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePacienteRequest $request
     * @return Response
     */
    public function store(StorePacienteRequest $request)
    {
        DB::transaction(function () use($request) {
            $identificacion = Identificacion::create(
                array_map(
                    fn ($valor) => ucwords($valor),
                    $request->safe()->only(['nombres', 'apellido_paterno', 'apellido_materno'])
                )
            );

            $direccion = Direccion::create($request->safe()->only(['pais_id', 'estado_id']));

            Paciente::create([
                ...$request->safe()->only(['sexo', 'antecedentes_familiares', 'fecha_nacimiento']),
                'identificacion_id' => $identificacion->id,
                'direccion_id' => $direccion->id
            ]);
        });

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return Response
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.paciente-show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return Response
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.paciente-form', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePacienteRequest $request
     * @param int $paciente
     * @return RedirectResponse
     */
    public function update(StorePacienteRequest $request, int $paciente)
    {
        Paciente::where('id', $paciente)
            ->update($request->safe()->only(['sexo', 'antecedentes_familiares', 'fecha_nacimiento']));

        Direccion::whereRelation('paciente', 'id', $paciente)
            ->update($request->safe()->only(['pais_id', 'estado_id']));

        Identificacion::whereRelation('paciente', 'id', $paciente)
            ->update(array_map(
                fn ($valor) => ucwords($valor),
                $request->safe()->only(['nombres', 'apellido_paterno', 'apellido_materno'])
            ));

        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $paciente
     * @return RedirectResponse
     */
    public function destroy(int $paciente)
    {
        DB::transaction(function () use ($paciente) {
            Identificacion::whereRelation('paciente', 'id', $paciente)->delete();
            Direccion::whereRelation('paciente', 'id', $paciente)->delete();
            Paciente::where('id', $paciente)->delete();
        });

        return redirect()->route('pacientes.index');
    }
}
