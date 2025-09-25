<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Models\InstructionGroup;
use Illuminate\Http\Request;

class InstructionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['instructiongrp'] = InstructionGroup::all();
        return response()->json([
            'status' => true,
            'message' => 'All instructions group Data',
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
                'category' => 'required'
            ]
        );
        if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateuser->errors()->all(),
            ], 401);
        }
        $instructiongrp=InstructionGroup::Create([
            
            'name' => $request ->name,
            'category'=> $request ->category,
   
        ]);
        return response()->json([
            'status'=> true,
            'message'=>'Instruction Group Created Successfully',
            'instruction'=>$instructiongrp,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['instructiongrp'] = InstructionGroup::select(
            'id',
            'name',
            'category'
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single instruction group data of given id',
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
                'category' => 'required',
            ]
        ); 
         if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateuser->errors()->all(),
            ], 401);
        }
        $instructiongrp=InstructionGroup::Create([
            'name' => $request ->name,
            'category'=> $request ->category,
   
        ]);
        return response()->json([
            'status'=> true,
            'message'=>'Instruction Group Created Successfully',
            'instructiongrp'=>$instructiongrp,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instructiongrp=InstructionGroup::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Instruction Group deleted Successfully',
               'instructiongrp'=>$instructiongrp,
           ],200);
        //
    }
}
