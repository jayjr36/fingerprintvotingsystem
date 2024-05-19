<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContestantController extends Controller
{
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
