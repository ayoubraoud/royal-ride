<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::with(['utilisateur', 'carExemplaire'])->get();
    }

    public function show(Comment $comment)
    {
        return $comment->load(['utilisateur', 'carExemplaire']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'car_exemplaire_id' => 'required|exists:car_exemplaire,id',
            'content' => 'required|string',
        ]);

        return Comment::create($validated);
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'content' => 'sometimes|string',
        ]);

        $comment->update($validated);
        return $comment;
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(['message' => 'Comment deleted']);
    }
}
