<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\ParticipantType;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all participants
        $participants = Participant::all();
        // Get all participant types
        $participantTypes = ParticipantType::all();
        return view(
            'participants.index', 
            [
                'participants' => $participants,
                'participantTypes' => $participantTypes
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incomming request
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'id_type' => 'required',
        ]);
        // $participant_type = ParticipantType::find($request->id_type);

        // if($participant_type && $participant_type->id !== null){
            
        // }
        $participant = new Participant;
        $participant->name = $request->name;
        $participant->surname = $request->surname;
        $participant->id_type = $request->id_type;
        // $participant->id_type = $participant_type->id;
        $participant->updated_at = now();
        $participant->created_at = now();

        $participant->save();
        // Participant::create($request->all());
        return redirect()->route('participants.index')->with('success', 'Participant created successfully.');
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        // Validate incomming request
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'id_type' => 'required',
        ]);

        $participant = Participant::find($id);
        $participant->update($request->all());
        return redirect()->route('participants.index')->with('success', 'Participant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        // Get participant to be removed
        $participant = Participant::find($id);
        $participant->delete();
        return redirect()->route('participants.index')->with('success', 'Participant deleted successfully.');

    }

    // ROUTES FUNCTIONS

    /**
     * Show the form for creating a new participant.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $participantTypes = ParticipantType::all();

        return view('participants.create', ['participantTypes' => $participantTypes]);
    }
    
    /**
     * Display the specified participant.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        // Get participant by id
        $participant = Participant::find($id);
        return view('participants.show', compact('participant'));
    }

    /**
     * Show the form for editing the specified participant.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participant = Participant::find($id);
        $participantTypes = ParticipantType::all();

        return view('participants.edit', [
            'participant' => $participant,
            'participantTypes' => $participantTypes,
        ]);
    }
}
