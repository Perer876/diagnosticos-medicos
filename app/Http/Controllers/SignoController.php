<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignoRequest;
use App\Http\Requests\UpdateSignoRequest;
use App\Models\Signo;
use Illuminate\Http\Request;

class SignoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signos = Signo::all();
        return view('signos.signos-index', compact('signos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signos.signos-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSignoRequest $request)
    {
        $signoData = $request->safe()->only(['nombre', 'descripcion']);
        Signo::create($signoData);
        
        return redirect()->route('signos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signo  $signo
     * @return \Illuminate\Http\Response
     */
    public function show(Signo $signo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Signo  $signo
     * @return \Illuminate\Http\Response
     */
    public function edit(Signo $signo)
    {
        return view('signos.signos-form', compact('signo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Signo  $signo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSignoRequest $request, Signo $signo)
    {
        $signoData = $request->safe()->only(['nombre', 'descripcion']);
        Signo::where('id', $signo->id)->update($signoData);

        return redirect()->route('signos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signo  $signo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signo $signo)
    {
        $signo->delete();
        return redirect()->route('signos.index');
    }
}
