<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['process']=Process::all();
        return response()->json([
            'status'=> true,
            'message'=>'All process Data',
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
            
            $process = Process::Create([
                'name' => $request ->name,
                'user_id'=> $request ->user_id,
               
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Process Created Successfully',
                'process'=>$process,
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['process'] = Process::select(
            'id',
            'name',
            'user_id',
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single Process data of given id',
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
            
            $process = Process::where(['id'=>$id])->update([
                'name' => $request->name,
                'user_id'=> $request->user_id, 
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Affiliate Status updated Successfully',
                'process'=>$process,
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $process = Process::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Process deleted Successfully',
               'atype'=>$process,
           ],200);
    }
}
