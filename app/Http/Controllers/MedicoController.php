<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MedicoController extends Controller
{
    public function index()
    {
        return "INDEX";
    }

    public function edit(User $user)
    {
        return "EDIT" . $user->id;
    }

    public function update(Request $request, User $user)
    {
        return "UPDATE" . $user->id;
    }
}
