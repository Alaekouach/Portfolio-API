<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        //
        $c=User::find($user_id)->contacts;
        //$c=Contact::all();

        return response()->json($c,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $c=Contact::create($request->all());
        
        return response()->json($c,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id,$contact_id)
    {
        //

        $c=Contact::find($contact_id);
        
        return response()->json($c,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $contact_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($contact_id)
    {
        //

        $c=Contact::find($contact_id);
        $c->delete();

        return response()->json([
            "Message" => "la suppression du contact a bien été effectuée"
        ],200);
    }
}
