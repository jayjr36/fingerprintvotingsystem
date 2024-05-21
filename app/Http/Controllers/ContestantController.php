<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contestant;

class ContestantController extends Controller
{
    public function indexContestants()
    {
        $presidentContestants = Contestant::where('category', 'president')->get();
        $mpContestants = Contestant::where('category', 'mp')->get();
        $councilorContestants = Contestant::where('category', 'councilor')->get();

        return view('contestants.index', compact('presidentContestants', 'mpContestants', 'councilorContestants'));
    }

    public function create()
    {
        return view('contestants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Contestant::create([
            'name' => $request->name,
            'category' => $request->category,
            'image' => $imageName,
        ]);

        return redirect('/contestants-uploaded')->with('success', 'Contestant uploaded successfully.');
    }
    public function index()
    {
    // $votes = Vote::all(); 

        $presidentContestants = [
            [
                'name' => 'President1',
                'image' => 'img.jpg',
               // 'votes' => 100,
            ],
            [
                'name' => 'President2',
                'image' => 'img2.jpg',
               // 'votes' => 150,
            ],
            [
                'name' => 'President3',
                'image' => 'img3.jpg',
               // 'votes' => 200,
            ],
        ];

        $mpContestants = [

            [
                'name' => 'MP1',
                'image' => 'img4.jpg',
                //'votes' => 100,
            ],
            [
                'name' => 'MP2',
                'image' => 'img5.jpg',
               // 'votes' => 150,
            ],
            [
                'name' => 'MP3',
                'image' => 'img6.jpg',
               // 'votes' => 200,
            ],
        ];

        $councilorContestants = [
            [
                'name' => 'Councilor1',
                'image' => 'img7.jpg',
               // 'votes' => 100,
            ],
            [
                'name' => 'Councilor2',
                'image' => 'img8.jpg',
                //'votes' => 150,
            ],
            [
                'name' => 'Councilor3',
                'image' => 'img9.jpg',
               // 'votes' => 200,
            ],
        ];

        return view('votespage', compact('presidentContestants', 'mpContestants', 'councilorContestants', ));
    }
}
