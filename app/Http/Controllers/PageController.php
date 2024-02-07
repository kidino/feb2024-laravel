<?php

namespace App\Http\Controllers;

use App\Models\ContactRecord;
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

        // echo "name : " . $request->input("name") .'<br>';
        // echo "email : " . $request->input("email") .'<br>';
        // echo "phone : " . $request->input("phone") .'<br>';
        // echo "message : " . $request->input("message") .'<br>';
        // echo "officer : ";
        // print_r( $request->input("officer") );
        // echo '<br>';


        $validation_rule = [
            "name"=> "required|min:5|max:255",
            "email" => "required|email:dns",
            "phone" => "regex:/^\+\d{4}-\d{3}\s?\d{4}$/i",
            "message" => "required"
        ];

        $validated_data = $request->validate(  $validation_rule );

        $validated_data['officers'] = json_encode( $request->input('officers') );

        // dd($validated_data);

        $new_record = ContactRecord::create( $validated_data ); 

        echo "success";

        print_r($new_record);



    }

}
