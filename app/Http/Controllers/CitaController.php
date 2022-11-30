<?php

namespace App\Http\Controllers;

use App\InferenceEngines\Enfermedades\EnfermedadEngine;
use App\Utilities\Logic\Contraptions\Variable;
use App\Http\Requests\{StoreCitaEvaluacionRequest, StoreCitaRequest, UpdateCitaRequest};
use App\Models\{Cita, Enfermedad, EstadoCita, Evaluacion, Paciente};
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\InferenceEngines\Enfermedades\Relations\Enfermedad as FactEnfermedad;

class CitaController extends Controller
{
    /**
     * Muestra un listado de todas la citas.
     * @return Response
     */
    public function index()
    {
        $citas = Cita::all();
        return view('citas.citas-index', compact('citas'));
    }

    /**
     * Muetra la vista para agendar una nueva cita para un paciente.
     * @param Paciente $paciente
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Paciente $paciente)
    {
        return view('citas.cita-form', compact('paciente'));
    }

    /**
     * Guarda una nueva cita para un paciente con los datos suministrados.
     * @param StoreCitaRequest $request
     * @return RedirectResponse
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
     * Muestra una cita en concreto.
     * @param Cita $cita
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Cita $cita)
    {
        return view('citas.cita-show', compact('cita'));
    }

    /**
     * Muetsra la vista para editar una cita concreta.
     * @param Cita $cita
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Cita $cita)
    {
        $paciente = $cita->paciente;
        return view('citas.cita-form', compact('paciente', 'cita'));
    }

    /**
     * Actualiza los datos de una cita en concreto a partir de la request.
     * @param UpdateCitaRequest $request
     * @param Cita $cita
     * @return RedirectResponse
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
     * Elimina de la base de datos la cita que se le indique.
     * @param Cita $cita
     * @return RedirectResponse
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();

        return to_route('pacientes.show', $cita->paciente);
    }

    /**
     * Cambia solo el estado de una cita.
     * @param Request $request
     * @param Cita $cita
     * @return RedirectResponse
     */
    public function cambioEstado(Request $request, Cita $cita)
    {
        $validated = $request->validate([
            'estado_cita' => ['required', 'numeric', Rule::exists('estados_cita', 'id')],
        ]);

        $cita->estado_cita_id = $validated['estado_cita'];
        $cita->save();

        return to_route('citas.show', $cita);
    }

    public function evaluar(Cita $cita)
    {
        return view('citas.cita-evaluar', compact('cita'));
    }

    public function evaluarStore(StoreCitaEvaluacionRequest $request, Cita $cita)
    {
        $evaluacion = $cita->evaluacion()->create([
            'enfermedad_id' => null,
        ]);
        $evaluacion->sintomas()->sync($request->input('sintomas', []));
        $evaluacion->signos()->sync($request->input('signos', []));
        $evaluacion->refresh();

        $ie = new EnfermedadEngine;

        foreach ($evaluacion->signos as $signo) {
            $ie->assert($signo->fact);
        }

        foreach ($evaluacion->sintomas as $sintoma) {
            $ie->assert($sintoma->fact);
        }

        $res = $ie->query(FactEnfermedad::is(new Variable));
        if ($res->current() !== null) {
            $evaluacion->enfermedad()->associate(
                Enfermedad::where('nombre', $res->current()->value[0])->first()
            );
            $evaluacion->save();
        }

        return to_route('citas.evaluacion.show', [$cita, $evaluacion]);
    }

    public function evaluacionShow(Cita $cita, Evaluacion $evaluacion)
    {
        return view('citas.cita-evaluacion-show', compact('cita', 'evaluacion'));
    }

    public function evaluacionEdit(Cita $cita, Evaluacion $evaluacion)
    {
        return view('citas.cita-evaluar', compact('cita', 'evaluacion'));
    }

    public function evaluacionUpdate(Cita $cita, Evaluacion $evaluacion, StoreCitaEvaluacionRequest $request)
    {
        $evaluacion->sintomas()->sync($request->input('sintomas', []));
        $evaluacion->signos()->sync($request->input('signos', []));
        $evaluacion->refresh();

        $ie = new EnfermedadEngine;

        foreach ($evaluacion->signos as $signo) {
            $ie->assert($signo->fact);
        }

        foreach ($evaluacion->sintomas as $sintoma) {
            $ie->assert($sintoma->fact);
        }

        $res = $ie->query(FactEnfermedad::is(new Variable));
        if ($res->current() !== null) {
            $evaluacion->enfermedad()->associate(
                Enfermedad::where('nombre', $res->current()->value[0])->first()
            );
        } else {
            $evaluacion->enfermedad()->disassociate();
        }
        $evaluacion->save();

        return to_route('citas.evaluacion.show', [$cita, $evaluacion]);
    }

    public function evaluacionDestroy(Cita $cita, Evaluacion $evaluacion)
    {
        $evaluacion->delete();
        return to_route('citas.show', $cita);
    }
}
