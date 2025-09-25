<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Models\ReminderType;
use Illuminate\Http\Request;

class ReminderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['reminder']=ReminderType::all();
        return response()->json([
            'status'=> true,
            'message'=>'All reminder type Data',
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
            
            $reminder = ReminderType::Create([
                'name' => $request ->name,
                'user_id'=> $request ->user_id,
               
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Reminder type  Created Successfully',
                'reminder'=>$reminder,
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['reminder'] = ReminderType::select(
            'id',
            'name',
            'user_id',
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single Reminder Type data of given id',
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
            
            $reminder = ReminderType::where(['id'=>$id])->update([
                'name' => $request->name,
                'user_id'=> $request->user_id, 
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Reminder Type updated Successfully',
                'reminder'=>$reminder,
            ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reminder = ReminderType::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Reminder Type deleted Successfully',
               'processqueue'=>$reminder,
           ],200);
        
    }
}
