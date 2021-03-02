<?php

namespace App\Http\Controllers;
use App\Models\Apropos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AproposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        //

        $a=User::find($user_id)->apropos[0];
        return response()->json($a,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$user_id)
    {
        //
        
        $a=Apropos::create($request->all());
        return response()->json($a,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id,$apropos_id)
    {
        //

        $a=Apropos::find($apropos_id);
        
        return response()->json($a,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user_id, $apropos_id)
    {
        //
       
        $a=Apropos::find($apropos_id); 
        $a->update($request->all()); 


        $image = $request->source_profil;
        $name = $request->photo_profil."-".time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($request->source_profil)->save(public_path('photos_profils/').$name);


        $a->photo_profil='http://127.0.0.1:8887/photos_profils/'.$name;
        $a->save();

        return response()->json($image,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id,$apropos_id)
    {
        //

        $a=Apropos::find($apropos_id);
        $a->delete();

        return response()->json([
            "Message" => "la suppression d'Apropos a bien été effectuée"
        ],200);
    }
}
