<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crud = Crud::all(); //select * from crud
        if ($crud != null) {
            return response()->json([
                'success' => true,
                'data' => $crud,
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ]);
        }
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
        //validation
        $this->validate($request, [
            'nameproduct' => 'required',
            'price'=>'required',
        ]);
        //insert data
        $crud = new Crud;
        //if nameproduct is same

        // if( $crud->nameproduct == strtoupper($request->nameproduct)){
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Data sudah ada',
        //     ]);
        // }else{
        //     $crud->nameproduct = $request->nameproduct;
        // }
        $crud->nameproduct  = $request->nameproduct;
        $crud->price = $request->price;
        $crud->save();
        return response()->json([
            'success' => true,
            'data' => $crud,

        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Crud $crud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crud $crud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //inisialisasi id
        $crud = Crud::find($id);
        $crud->nameproduct = $request->nameproduct;
        $crud->price = $request->price;

        if ($crud->save()) {
            return response()->json([
                'success' => true,
                'msg'=>'Data berhasil diubah',
                'data' => $crud,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data gagal diubah',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete Data
        $crud = Crud::find($id);
        $crud->delete();
        return response()->json([
            'success' => true  ,
            'message' => 'Data berhasil dihapus',
        ]);

    }
}
