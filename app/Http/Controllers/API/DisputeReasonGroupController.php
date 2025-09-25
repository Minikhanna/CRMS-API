<?php


namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Http\Controllers\Controller;

use App\Models\DisputeReasonGroup;
use Illuminate\Http\Request;

class DisputeReasonGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['disputeReasonGrp'] = DisputeReasonGroup::all();
        return response()->json([
            'status' => true,
            'message' => 'All disputereasons Group Data',
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
        $disputeReasonGrp=DisputeReasonGroup::Create([
            'name' => $request ->name,
            'category'=> $request ->category,
   
        ]);
        return response()->json([
            'status'=> true,
            'message'=>'Dispute Reason Group Created Successfully',
            'disputeReasonGrp'=>$disputeReasonGrp,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['disputeReasonGrp'] = DisputeReasonGroup::select(
            'id',
            'name',
            'category'
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single Dispute Reason Group of given id',
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
        $disputeReasonGrp=DisputeReasonGroup::Create([
            'name' => $request ->name,
            'category'=> $request ->category,
   
        ]);
        return response()->json([
            'status'=> true,
            'message'=>'Dispute Reason Group Created Successfully',
            'disputeReasonGrp'=>$disputeReasonGrp,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $disputeReasonGrp= DisputeReasonGroup::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Dispute Reason Groupdeleted Successfully',
               'disputeReasonGrp'=>$disputeReasonGrp,
           ],200);
    }
}
