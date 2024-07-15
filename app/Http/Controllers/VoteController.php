<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Voter;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'voter_id' => 'required|integer',
            'president' => 'required|string',
            'mp' => 'required|string',
            'councillor' => 'required|string',
        ]);

        $voter = Voter::where('fingerprint_id',$validatedData['voter_id'])
                      ->whereNotNull('fingerprint_id')
                      ->first();

        if (!$voter) {
            return response()->json(['error' => 'Voter ID not found', 'success' => 'false'], 400);
        }

        // Check if the voter has already voted
        $existingVote = Vote::where('voter_id', $validatedData['voter_id'])->first();

        if ($existingVote) {
            return response()->json(['error' => 'This voter has already voted', 'success' => 'false'], 400);
        }

        $vote = Vote::create([
            'voter_id' => $validatedData['voter_id'],
            'president' => $validatedData['president'],
            'MP' => $validatedData['mp'],
            'councilor' => $validatedData['councillor'],
        ]);

        return response()->json(['message' => 'Vote recorded successfully', 'success' => 'true'], 201);
    }

    public function index()
    {
        $votes = Vote::all();
        return response()->json($votes);
    }
}
