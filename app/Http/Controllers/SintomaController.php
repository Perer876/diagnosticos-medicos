<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSintomaRequest;
use App\Http\Requests\UpdateSintomaRequest;
use App\Models\Sintoma;
use Illuminate\Http\Request;

class SintomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sintomas = Sintoma::all();
        return view('sintomas.sintomas-index', compact('sintomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sintomas.sintomas-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSintomaRequest $request)
    {
        Sintoma::create([
            $request->safe()->only(['nombre', 'descripcion']),
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion')
        ]);
        
        return redirect()->route('sintomas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sintoma  $sintoma
     * @return \Illuminate\Http\Response
     */
    public function show(Sintoma $sintoma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sintoma  $sintoma
     * @return \Illuminate\Http\Response
     */
    public function edit(Sintoma $sintoma)
    {
        return view('sintomas.sintomas-form', compact('sintoma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sintoma  $sintoma
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSintomaRequest $request, Sintoma $sintoma)
    {
        $sintomaData = $request->safe()->only(['nombre', 'descripcion']);
        Sintoma::where('id', $sintoma->id)->update($sintomaData);

        return redirect()->route('sintomas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sintoma  $sintoma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sintoma $sintoma)
    {
        $sintoma->delete();
        return redirect()->route('sintomas.index');
    }
}
