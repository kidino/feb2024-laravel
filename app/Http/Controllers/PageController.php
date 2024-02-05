<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function team() {

        $team_name = "Software Department";

        $team = [
            [
                "name"=> "Ali",
                "position" => "Chief Executive Officer"
            ],
            [
                "name"=> "Abu",
                "position" => "Chief Finance Officer"
            ],
            [
                "name"=> "Siti",
                "position" => "Chief Technology Officer"
            ],
            [
                "name"=> "Iszuddin",
                "position" => "Chief Operation Officer"
            ],
            [
                "name"=> "Ah Seng",
                "position" => "Chief of People"
            ],
        ];

        return view('page.team', compact("team_name", "team"));
    }

    function contact() {
        return view("page.contact");
    }

    function contact_submit(Request $request) {

        // dd($request);

        echo "name : " . $request->input("name") .'<br>';
        echo "email : " . $request->input("email") .'<br>';
        echo "phone : " . $request->input("phone") .'<br>';
        echo "message : " . $request->input("message") .'<br>';
    }


}
