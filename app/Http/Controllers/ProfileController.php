<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Adresse;
use Illuminate\Support\Facades\Storage; // Ajoutez cette ligne

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    
    public function listeUsers(Request $request)
{
    // Récupérer les utilisateurs dont l'adresse est 'Adresse par défaut'
    $users = User::join('adresses', 'users.id', '=', 'adresses.user_id')
                    ->where('adresses.nom_adresse', 'Adresse par défaut')
                    ->get();

    // Retourner la vue 'profile.listeUsers' en passant les utilisateurs récupérés
    return view('profile.listeUsers', [
        'users' => $users,
    ]);
}
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function updateInfo(Request $request)
    {
        // Valider les entrées
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'pseudo' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
        ]);

        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Mettre à jour les informations de l'utilisateur
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->pseudo = $request->input('pseudo');
        $user->telephone = $request->input('telephone');
        $user->email = $request->input('email');

        // Enregistrer les modifications
        $user->save();

        // Rediriger l'utilisateur avec un message de sélection
        return redirect()->back()->with('success', 'Informations mises à jour avec succès.');
    }   



    public function imageUpdate(Request $request)
    {
        // Valider le fichier image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Stocker l'image dans le dossier 'images' du disque 'public'
        $imagePath = $request->file('image')->store('images', 'public');

        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Supprimer l'ancienne image si elle existe
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        // Mettre à jour le chemin de l'image de l'utilisateur
        $user->image = $imagePath;
        $user->save();

        // Rediriger l'utilisateur avec un message de succès
        return redirect()->back()->with('success', 'Image de profil mise à jour avec succès.');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function supprimer(Request $request, $id)
    {
        // Supprimer l'utilisateur avec l'ID donné
        $user = User::findOrFail($id);
        $user->delete();

        // Rediriger vers une autre page ou afficher un message de succès
        return redirect()->route('profile.listeUsers')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
