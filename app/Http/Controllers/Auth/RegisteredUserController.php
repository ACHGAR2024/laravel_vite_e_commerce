<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Adresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'prenom' => ['required', 'string', 'max:100'],
            'pseudo' => ['nullable', 'string', 'max:100', 'unique:users'],
            'telephone' => ['nullable', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'adresse' => ['required', 'string', 'max:255'],
            'code_postal' => ['required', 'string', 'max:5'],
            'ville' => ['required', 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:100'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'pseudo' => $request->pseudo,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client',
            'role_id' => 2,
            'image' => $imagePath,
        ]);

        Adresse::create([
            'nom_adresse' => 'Adresse par défaut',
            'adresse' => $request->adresse,
            'code_postal' => $request->code_postal,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'user_id' => $user->id, // Ensure user_id is set correctly here
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
