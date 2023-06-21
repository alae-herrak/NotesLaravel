<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = auth()->user()->notes;
        return view('notes.index', ['notes' => $notes]);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:25'],
            'content' => ['required', 'string', 'max:255'],
        ]);

        $request->user()->notes()->create($validated);

        return redirect('/notes');
    }

    public function show(Note $note)
    {
        return redirect('/notes');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', ['note' => $note]);
    }

    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:25'],
            'content' => ['required', 'string', 'max:255'],
        ]);

        $note->update($validated);

        return redirect('/notes');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect('/notes');
    }
}
