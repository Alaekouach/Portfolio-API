<?php

namespace App\Http\Controllers;
use App\Models\Projet;
use App\Models\Technologie;
use App\Models\User;

use Illuminate\Http\Request;

class TechnologieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        //

        $t=User::find($user_id)->technologies;
        return response()->json($t,200);
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
        //  $sav=Technologie::create($t->all());   
        
                $t= new Technologie;

                $t->intitule_technologie=$request->intitule_technologie;
                $t->user_id=$request->user_id;
                $t->projet_id=$request->projet_id+1;
                $t->categorie_id=$request->categorie_id;

                $t->save();
        
       
         return response()->json($t,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id,$technologie_id)
    {
        //

        $t=Technologie::find($technologie_id);        
        return response()->json($t,200);
    }


    public function show_by_projet($projet_id)
    {
        //
        $p=Projet::find($projet_id);
        $t=$p->technologies;
        return response()->json($t,200);
    }

    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$projet_id)
    {
        $p=Projet::find($projet_id);
        
        $tec=$p->technologies;
        $exist=0;
        
        for($i=0;$i<$tec->count();$i++)
        {
            if($tec[$i]->intitule_technologie==$request->intitule_technologie)
            {
                $exist=1;
                $j=$i;
            }
        }
         
        if($exist==0)
        {
            $t= new Technologie;

            $t->intitule_technologie=$request->intitule_technologie;
            $t->user_id=$request->user_id;
            $t->projet_id=$projet_id;
            $t->categorie_id=$request->categorie_id;

            $t->save();
            return response()->json($t,200);
        }
        else{
            return response()->json([
                "Message" => "La technologie ".$tec[$j]->intitule_technologie." existe déjà pour ce projet."
            ],200); 
        }              
        return response()->json($t,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id,$technologie_id)
    {
        //

        $t=Technologie::find($technologie_id);
        $t->delete();

        return response()->json([
            "Message" => "la suppression de la technologie a bien été effectuée"
        ],200);
    }
}
