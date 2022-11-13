<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePruebaPostMortemRequest;
use App\Http\Requests\UpdatePruebaPostMortemRequest;
use App\Models\PruebaPostMortem;
use Illuminate\Http\Request;

class PruebaPostMortemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pruebasPostMortem = PruebaPostMortem::all();
        return view('pruebas_post_mortem.pruebas_post_mortem-index', compact('pruebasPostMortem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pruebas_post_mortem.pruebas_post_mortem-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePruebaPostMortemRequest $request)
    {
        $pruebaData = $request->safe()->only(['nombre', 'descripcion']);
        PruebaPostMortem::create($pruebaData);
        
        return redirect()->route('pruebas_post_mortem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PruebaPostMortem  $pruebaPostMortem
     * @return \Illuminate\Http\Response
     */
    public function show(PruebaPostMortem $pruebaPostMortem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PruebaPostMortem  $pruebaPostMortem
     * @return \Illuminate\Http\Response
     */
    public function edit(PruebaPostMortem $pruebas_post_mortem)
    {
        return view('pruebas_post_mortem.pruebas_post_mortem-form', compact('pruebas_post_mortem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PruebaPostMortem  $pruebaPostMortem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePruebaPostMortemRequest $request, PruebaPostMortem $pruebas_post_mortem)
    {
        $pruebaData = $request->safe()->only(['nombre', 'descripcion']);
        PruebaPostMortem::where('id', $pruebas_post_mortem->id)->update($pruebaData);

        return redirect()->route('pruebas_post_mortem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PruebaPostMortem  $pruebaPostMortem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PruebaPostMortem $pruebas_post_mortem)
    {
        $pruebas_post_mortem->delete();        
        return redirect()->route('pruebas_post_mortem.index');
    }
}
