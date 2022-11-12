<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEspecialidadRequest;
use App\Http\Requests\UpdateEspecialidadRequest;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.especialidades-index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('especialidades.especialidades-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreEspecialidadRequest $request)
    {
        Especialidad::create($request->safe()->all());
        return redirect()->route('especialidades.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Especialidad $especialidad
     * @return Response
     */
    public function edit(Especialidad $especialidad)
    {
        return view('especialidades.especialidades-form', compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEspecialidadRequest $request
     * @param int $especialidad
     * @return Response
     */
    public function update(UpdateEspecialidadRequest $request, int $especialidad)
    {
        Especialidad::where('id', $especialidad)->update($request->safe()->all());
        return redirect()->route('especialidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $especialidad
     * @return Response
     */
    public function destroy(int $especialidad)
    {
        Especialidad::destroy($especialidad);
        return redirect()->route('especialidades.index');
    }
}
