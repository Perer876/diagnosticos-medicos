<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMedicoRequest;
use Illuminate\Http\Request;
use App\Models\User;

class MedicoController extends Controller
{
    public function index()
    {
        $usuarios = User::with([
            'direccion' => ['pais', 'estado'],
            'identificacion',
            'medico']
        )->whereRolIs('Medico')->get();

        return view('medicos.medicos-index', compact('usuarios'));
    }

    public function edit(User $user)
    {
        return view('medicos.medico-form', compact('user'));
    }

    public function update(UpdateMedicoRequest $request, User $user)
    {
        $user->medico->cedula = $request->input('cedula');
        $user->medico->save();
        $user->medico->especialidades()->sync($request->input('especialidades', []));

        return redirect()->route('users.show', $user);
    }
}
