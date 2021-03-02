<?php

namespace App\Http\Controllers;
use App\Models\Experience;
use App\Models\Projet;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($projet_id)
    {
        //
        
        $e=Projet::find($projet_id)->experiences;
        return response()->json($e,200);
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
        $compt=count($request->photo_projet); 

        for($i=0;$i<$compt;$i++){

            $e=new Experience;            
            $e->projet_id= $request->projet_id[$i]+1;                     

            $image = $request->source_photo[$i];
            $name = $request->photo_projet[$i]."-".time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->source_photo[$i])->save(public_path('projets/').$name);

            $e->photo_projet= 'http://127.0.0.1:8887/projets/'.$name;
            $e->save();  
         }
           
        
        return response()->json($e,201);

        
    }


    public function store2(Request $request,$projet_id)
    {
        //
        $compt=count($request->photo_projet); 

        for($i=0;$i<$compt;$i++){

            $e=new Experience;            
            $e->projet_id= $projet_id;                     

            $image = $request->source_photo[$i];
            $name = $request->photo_projet[$i]."-".time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->source_photo[$i])->save(public_path('projets/').$name);

            $e->photo_projet= 'http://127.0.0.1:8887/projets/'.$name;
            $e->save();  
         }
           
        
        return response()->json($e,201);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($projet_id,$experience_id)
    {
        //

        $e=Experience::find($experience_id);
        
        return response()->json($e,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$projet_id,$experience_id)
    {
        //

        $e=Experience::find($experience_id);
        $e->update($request->all());

        
        return response()->json($e,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($projet_id,$experience_id)
    {
        //

        $e=Experience::find($experience_id);
        $e->delete();

        return response()->json([
            "Message" => "la suppression d'une experience a bien été effectuée"
        ],200);
    }
}
