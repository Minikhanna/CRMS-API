<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Models\LetterCategory;
use Illuminate\Http\Request;

class LetterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['lettercat'] = LetterCategory::all();
        return response()->json([
            'status' => true,
            'message' => 'All Letter Category group Data',
            'data' => $data,
        ], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validateuser = FacadesValidator::make(
            $request->all(),
            [
                'name' => 'required',
            ]
        );
        if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateuser->errors()->all(),
            ], 401);
        }
        $lettercat=LetterCategory::Create([
            
            'name' => $request ->name,
   
        ]);
        return response()->json([
            'status'=> true,
            'message'=>'Letter Category Created Successfully',
            'lettercat'=>$lettercat,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['Lettercat'] = LetterCategory::select(
            'id',
            'name',
            'category'
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Letter Category data of given id',
            'data'=>$data,
        ],200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateuser = FacadesValidator::make(
            $request->all(),
            [
                'name' => 'required',
            ]
        ); 
         if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateuser->errors()->all(),
            ], 401);
        }
        $lettercat=LetterCategory::Create([
            'name' => $request ->name,
   
        ]);
        return response()->json([
            'status'=> true,
            'message'=>'Letter category Created Successfully',
            'lettercat'=>$lettercat,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lettercat=LetterCategory::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Letter cated deleted Successfully',
               'instructiongrp'=>$lettercat,
           ],200);
    }
}
