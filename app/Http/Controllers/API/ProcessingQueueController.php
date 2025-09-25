<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Models\ProcessingQueue;
use Illuminate\Http\Request;

class ProcessingQueueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['process']=ProcessingQueue::all();
        return response()->json([
            'status'=> true,
            'message'=>'All processing Queue Data',
            'data'=>$data,
        ],200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateuser = FacadesValidator::make(
            $request->all(),
            [
                'name'=>'required',
                'user_id'=>'required',
            ]
            );
            if($validateuser->fails()){
                return response()->json([
                    'status'=> false,
                    'message'=>'Validation Error',
                    'errors'=>$validateuser->errors()->all(),
                ],401);
            }
            
            $processqueue = ProcessingQueue::Create([
                'name' => $request ->name,
                'user_id'=> $request ->user_id,
               
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Processing Queue Created Successfully',
                'processqueue'=>$processqueue,
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['processqueue'] = ProcessingQueue::select(
            'id',
            'name',
            'user_id',
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single Processing queue data of given id',
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
                'name'=>'required',
                'user_id'=>'required',
            ]
            );
            if($validateuser->fails()){
                return response()->json([
                    'status'=> false,
                    'message'=>'Validation Error',
                    'errors'=>$validateuser->errors()->all(),
                ],401);
            }
            
            $processqueue = ProcessingQueue::where(['id'=>$id])->update([
                'name' => $request->name,
                'user_id'=> $request->user_id, 
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Processing Queue updated Successfully',
                'processqueue'=>$processqueue,
            ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $processqueue = ProcessingQueue::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Processing Queue deleted Successfully',
               'processqueue'=>$processqueue,
           ],200);
        
    }
}
