<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        return Utilisateur::with('role')->get();
    }

    public function show(Utilisateur $utilisateur)
    {
        return $utilisateur->load('role', 'favorites.carExemplaire', 'comments.carExemplaire');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateurs,email',
            'password_hash' => 'required|string',
            'avatar_url' => 'nullable|url|max:500',
            'role_id' => 'nullable|exists:roles,id',
        ]);

        return Utilisateur::create($validated);
    }

    public function update(Request $request, Utilisateur $utilisateur)
    {
        $validated = $request->validate([
            'username' => 'sometimes|string|max:100',
            'email' => "sometimes|email|unique:utilisateurs,email,{$utilisateur->id}",
            'password_hash' => 'sometimes|string',
            'avatar_url' => 'nullable|url|max:500',
            'role_id' => 'nullable|exists:roles,id',
        ]);

        $utilisateur->update($validated);
        return $utilisateur;
    }

    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
        return response()->json(['message' => 'Utilisateur deleted']);
    }
};