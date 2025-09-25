<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\DisputeReason;
use Illuminate\Http\Request;

class DisputeReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['disputeReason'] = DisputeReason::all();
        return response()->json([
            'status' => true,
            'message' => 'All disputereasons Data',
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
                'dispute_group_id' => 'required',
            ]
        );
        if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateuser->errors()->all(),
            ], 401);
        }
        $disputeReason=DisputeReason::Create([
            'name' => $request ->name,
            'dispute_group_id'=> $request ->dispute_group_id,
   
        ]);
        return response()->json([
            'status'=> true,
            'message'=>'Dispute Reason Created Successfully',
            'disputeReason'=>$disputeReason,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['disputeReason'] = DisputeReason::select(
            'id',
            'name',
            'dispute_group_id'
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single Dispute Reason of given id',
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
                'dispute_group_id' => 'required',
            ]
        ); 
         if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateuser->errors()->all(),
            ], 401);
        }
        $disputeReason=DisputeReason::Create([
            'name' => $request ->name,
            'dispute_group_id'=> $request ->dispute_group_id,
   
        ]);
        return response()->json([
            'status'=> true,
            'message'=>'Dispute Reason Created Successfully',
            'disputeReason'=>$disputeReason,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $disputeReason= DisputeReason::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Dispute Reason deleted Successfully',
               'disputeReason'=>$disputeReason,
           ],200);
    }
}
