<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParticipantType;
use Illuminate\Support\Facades\DB;

class ParticipantTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all participants
        $participantTypes = ParticipantType::all();
        return view('participantTypes.index',compact('participantTypes'));
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
            'min' => 'required',
            'max' => 'required',
        ]);
        $participant_type = new ParticipantType;
        $participant_type->name = $request->name;
        $participant_type->min = $request->min;
        $participant_type->max = $request->max;
        $participant_type->updated_at = now();
        $participant_type->created_at = now();

        $participant_type->save();
        // ParticipantType::create($request->all());
        return redirect()->route('participantTypes.index')->with('success', 'Participant type created successfully.');
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
            'min' => 'required',
            'max' => 'required',
        ]);

        // $participantTypeUpdated = new ParticipantType;
        // $participantTypeUpdated->name = $request->name;
        // $participantTypeUpdated->min = $request->min;
        // $participantTypeUpdated->max = $request->max;

        $participantType = ParticipantType::find($id);
        // $participantType->update($participantTypeUpdated);
        $participantType->update($request->all());
        return redirect()->route('participantTypes.index')->with('success', 'Participant type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        // Get participant to be removed
        $participantType = ParticipantType::find($id);
        $participantType->delete();
        return redirect()->route('participantTypes.index')->with('success', 'Participant type deleted successfully.');
    }

    // ROUTES FUNCTIONS

    /**
     * Show the form for creating a new participant.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participantTypes.create');
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
        $participantType = ParticipantType::find($id);
        return view('participantTypes.show', compact('participantType'));
    }

    /**
     * Show the form for editing the specified participant.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participantType = ParticipantType::find($id);
        return view('participantTypes.edit', compact('participantType'));
    }
}
