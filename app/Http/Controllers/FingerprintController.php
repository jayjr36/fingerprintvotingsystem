<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class FingerprintController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'region' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'dob' => 'required'
        ]);

        $voter = new Voter();
        $voter->name = $request->name;
        $voter->region = $request->region;
        $voter->district = $request->district;
        $voter->ward = $request->ward;
        $voter->birth_date = $request->dob;
        $voter->save();

        return redirect()->route('register')->with('success', 'User registered successfully');
    }

    public function updateFingerprint(Request $request)
    {
        $request->validate([
            'fingerprint_id' => 'required',
        ]);

        $lastUser = Voter::latest()->first();

        if ($lastUser) {
            $lastUser->update(['fingerprint_id' => $request->fingerprint_id]);
            return response()->json(['message' => 'Fingerprint ID added to the last user successfully']);
        } else {
            return response()->json(['error' => 'No user found']);
        }
    }
}
