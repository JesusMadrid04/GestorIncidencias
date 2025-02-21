<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->role == 'user') {
            $tickets = Ticket::where('user_id', auth()->id())->get();
            return view('tickets.index', compact('tickets'));
        } else {
            $tickets = Ticket::All();
            return view('tickets.index', compact('tickets'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category' => 'required|in:Education,Technical,Commentary',
            'priority' => 'required|in:low,medium,high',
        ]);

        $ticket = Ticket::create([
            'title' => $request->title,
            'body' => $request->body,
            'category' => $request->category,
            'priority' => $request->priority,
            'user_id' => auth()->id(),
        ]);

        Mail::to('jesusmadridluque2005@gmail.com')->send(new ContactMail($ticket));
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket eliminado correctamente.');
    }

    public function realizarOperacion()
    {
        $resultado = 'Operación exitosa';

        Mail::to('jesusmadridluque2005@gmail.com')->send(new ContactMail($resultado));

    }
}
