<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $c=Categorie::all();

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

        $c=Categorie::create($request->all());
        
        return response()->json($c,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categorie_id)
    {
        //

        $c=Categorie::find($categorie_id);
        
        return response()->json($c,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categorie_id)
    {
        //

        $c=Categorie::find($categorie_id);
        $c->update($request->all());

        
        return response()->json($c,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categorie_id)
    {
        //

        $c=Categorie::find($categorie_id);
        $c->delete();

        return response()->json([
            "Message" => "la suppression de la categorie a bien été effectuée"
        ],200);
    }
}
