<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Parcours;
use Illuminate\Http\Request;

class ParcoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        //
        $p=User::find($user_id)->parcours;
        return response()->json($p,200);
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
        $p=Parcours::create($request->all());
        return response()->json($p,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id,$parcours_id)
    {
        //
        $p=Parcours::find($parcours_id);
        
        return response()->json($p,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user_id, $parcours_id)
    {
        //

        $p=Parcours::find($parcours_id);
        $p->update($request->all());

        
        return response()->json($p,200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id,$parcours_id)
    {
        //

        $p=Parcours::find($parcours_id);
        $p->delete();

        return response()->json([
            "Message" => "la suppression du parcours a bien été effectuée"
        ],200);
    }
}
