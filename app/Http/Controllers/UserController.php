<?php
// UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function bannir(Request $request, $id)
    {
        // Récupérer l'utilisateur par son ID
        $user = User::findOrFail($id);

        // Mettre à jour le rôle_id de l'utilisateur à 3 (ou à la valeur correspondante pour bannir)
        $user->update(['role_id' => 3]);

        // Rediriger ou retourner une réponse appropriée
        return redirect()->back()->with('success', 'Utilisateur banni avec succès.');
    }
}