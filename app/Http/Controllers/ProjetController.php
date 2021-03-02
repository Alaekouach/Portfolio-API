<?php

namespace App\Http\Controllers;
use App\Models\Projet;
use App\Models\Experience;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        //

        $pr=User::find($user_id)->projets;
    
            $tab=[];

            for($i=0;$i<$pr->count();$i++)
            {
                array_push($tab,$pr[$i]->experiences);   
            }
            
        return response()->json($pr,200);

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

        $pr=Projet::create($request->all());
        
        return response()->json($pr,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id,$projet_id)
    {
        //

        $pr=Projet::find($projet_id);

        $tab=$pr->experiences;
    
               
        return response()->json($pr,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user_id, $projet_id)
    {
        //

        $pr=Projet::find($projet_id);
        $pr->update($request->all());

        
        return response()->json($pr,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id,$projet_id)
    {
        //

        $pr=Projet::find($projet_id);
        $pr->delete();

        return response()->json([
            "Message" => "la suppression du projet a bien été effectuée"
        ],200);
    }
}
