<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan semua data
        $categori = Categori::all();
        //response json
        return response()->json($categori);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi form
        $this->validate($request,[
            'namakategori'=>'required',
            'description'=>'required'
        ]);
        //menyimpan data
        $categori = Categori::create([
            'namakategori'=>$request->namakategori,
            'description'=>$request->description
        ]);

        //response json
        return response()->json($categori);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categori $categori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categori $categori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $categori= Categori::find($id);
        $categori->namakategori = $request->namakategori;
        $categori->description = $request->description;
        if($categori->save()){
            return response()->json($categori);
        }else {
            return response()->json('gagal save');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $categori= Categori::find($id);
        $categori->delete();
        //respose json
        return response()->json($categori);
    }
}
