<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Participant;
use App\Models\ParticipantType;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all teams
        $teams = Team::all();
        // Get all participants
        $participants = Participant::all();
        // Get all participant types
        $participantTypes = ParticipantType::all();
        return view(
            'teams.index', 
            [   
                'teams' => $teams,
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
            'payload' => 'required|max:4294967294',
        ]);

        $team = new Team;
        $team->name = $request->name;
        $team->payload = $request->payload;
        $team->updated_at = now();
        $team->created_at = now();

        $team->save();
        // Team::create($request->all());
        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
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
        $request = validate([
            'name' => 'required|max:255',
            'payload' => 'required|max:4294967294',
        ]);

        $team_updated = new Team;
        $team_updated->name = $request->name;
        $team_updated->payload = $request->payload;

        $team = Team::find($id);
        $team->update($team_updated);
        return redirect()->route('teams.index')->with('success', 'Team information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Get team to be removed
        $team = Team::find($id);
        $team_name = $team->name;
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team ' + $team_name + ' deleted successfully.');

    }

    // ROUTES FUNCTIONS

    /**
     * Show the form for creating a new team.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all participants
        $participants = Participant::all();
        // Get all participant types
        $participantTypes = ParticipantType::all();
        return view(
            'teams.create', 
            [   
                'participants' => $participants,
                'participantTypes' => $participantTypes
            ]
        );
        // return view('teams.create');
    }

    /**
     * Display the specified team.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        // Get team by id
        $team = Team::find($id);
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified team.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get team to edit
        $team = Team::find($id);
        // Get all participants
        $participants = Participant::all();
        // Get all participant types
        $participantTypes = ParticipantType::all();
        return view(
            'teams.edit', 
            [   
                'team' => $team,
                'participants' => $participants,
                'participantTypes' => $participantTypes
            ]
        );
        // return view('teams.edit', compact('team'));
    }

    

    

    
}
