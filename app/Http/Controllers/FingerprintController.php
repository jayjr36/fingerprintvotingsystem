<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
use Carbon\Carbon;


class FingerprintController extends Controller
{
    public function index()
    {
        $voters = Voter::all();
        return view('allvoters', compact('voters'));
    }

    public function create()
    {
        return view('voters.create');
    }




    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'card_no'=> 'required',
            'region' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'dob' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $dob = Carbon::parse($value);
                    $now = Carbon::now();
                    $age = $now->diffInYears($dob);
                    
                    if ($age < 1) {
                        $fail('The date of birth must be at least one year old.');
                    }
                    
                    if ($age < 18) {
                        $fail('The contestant must be at least 18 years old.');
                    }
                },
            ],
        ]);

        try {
            $voter = new Voter();
            $voter->name = $request->name;
            $voter->card_no = $request->card_no;
            $voter->region = $request->region;
            $voter->district = $request->district;
            $voter->ward = $request->ward;
            $voter->birth_date = $request->dob;
            $voter->save();

            return redirect()->route('register')->with('success', 'Details saved awaiting fingerprint');
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Registration failed, please try again.');
        }
    }
    public function updateFingerprint(Request $request)
    {
        $request->validate([
            'fingerprint_id' => 'required',
        ]);

        $lastUser = Voter::latest()->first();

        if ($lastUser) {
            $lastUser->update(['fingerprint_id' => $request->fingerprint_id]);
            return response()->json(['message' => 'Fingerprint ID added to the last user successfully', 'success' => true]);
        } else {
            return response()->json(['error' => 'No user found', 'success' => false]);
        }
    }
}
