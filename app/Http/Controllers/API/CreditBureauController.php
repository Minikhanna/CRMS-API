<?php


namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Http\Controllers\Controller;

use App\Models\CreditBureau;
use Illuminate\Http\Request;

class CreditBureauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['creditB']=CreditBureau::all();
        return response()->json([
            'status'=> true,
            'message'=>'All Credit Bureau Data',
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
                'bureau_name'=>'required',
                'address'=>'required',
                  'city'=>'required',
                 'state'=>'required',
                 'zip'=>'required',
                 'phone_number'=>'required'
            ]
            );
            if($validateuser->fails()){
                return response()->json([
                    'status'=> false,
                    'message'=>'Validation Error',
                    'errors'=>$validateuser->errors()->all(),
                ],401);
            }
            
            $creditB= CreditBureau::Create([
                'bureau_name' => $request ->bureau_name,
                'address'=> $request ->address,
                'city'=> $request ->city,
                'state'=> $request ->state,
                'zip'=> $request ->zip,
                'phone_number'=> $request ->phone_number,
               
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Credit Bureau Created Successfully',
                'creditB'=>$creditB,
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['creditB'] = CreditBureau::select(
            'id',
            'bureau_name',
            'address',
            'city',
            'state',
            'zip',
            'phone_number'
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single Credit Bureau of given id',
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
                'bureau_name'=>'required',
                'address'=>'required',
                'city'=>'required',
                'state'=>'required',
                'zip'=>'required',
                'phone_number'=>'required'
            ]
            );
            if($validateuser->fails()){
                return response()->json([
                    'status'=> false,
                    'message'=>'Validation Error',
                    'errors'=>$validateuser->errors()->all(),
                ],401);
            }
            
            $creditB = CreditBureau::where(['id'=>$id])->update([
                'bureau_name' => $request ->bureau_name,
                'address'=> $request ->address,
                'city'=> $request ->city,
                'state'=> $request ->state,
                'zip'=> $request ->zip,
                'phone_number'=> $request ->phone_number, 
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Credit bureau updated Successfully',
                'creditB'=>$creditB,
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $creditB= CreditBureau::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Affiliate Status deleted Successfully',
               'creditB'=>$creditB,
           ],200);
    }
}
