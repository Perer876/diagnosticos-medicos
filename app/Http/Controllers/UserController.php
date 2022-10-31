<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Identificacion;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $usuarios = User::with(['estado', 'identificacion', 'rol'])->get();

        return view('users.users-index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Rol::pluck('nombre', 'id');

        return view('users.users-form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return Response
     */
    public function store(StoreUserRequest $request)
    {
        DB::transaction(function () use($request) {
            $identificacion = Identificacion::create(
                array_map(
                    fn ($valor) => ucwords($valor),
                    $request->safe()->only(['nombres', 'apellido_paterno', 'apellido_materno'])
                )
            );

            User::create([
                ...$request->safe()->only(['alias', 'rol_id']),
                'password' => Hash::make($request->input('password')),
                'identificacion_id' => $identificacion->id,
            ]);
        });

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        $roles = Rol::pluck('nombre', 'id');

        return view('users.users-form', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, int $user)
    {
        $userData = $request->safe()->only(['alias', 'rol_id']);
        if ($request->input('password') !== null) {
            $userData['password'] = Hash::make($request->input('password'));
        }

        User::where('id', $user)->update($userData);

        Identificacion::whereRelation('user', 'id', $user)->update(
            array_map(
                fn ($valor) => ucwords($valor),
                $request->safe()->only(['nombres', 'apellido_paterno', 'apellido_materno'])
            )
        );

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $user
     * @return Response
     */
    public function destroy(int $user)
    {
        DB::transaction(function () use ($user) {
            Identificacion::whereRelation('user', 'id', $user)->delete();
            User::where('id', $user)->delete();
        });

        return redirect()->route('users.index');
    }
}
