<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $notes = Note::where('user_id', auth()->id())
                     ->whereBetween('date', [$request->start_date, $request->end_date])
                     ->orderBy('date', 'asc')
                     ->get();

        return response()->json($notes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'date' => 'required|date',
        ]);

        $note = new Note();
        $note->user_id = Auth::id();
        $note->content = $request->content;
        $note->date = $request->date;
        $note->save();

        return response()->json($note, 201);
    }
}
