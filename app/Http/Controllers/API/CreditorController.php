<?php


namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Http\Controllers\Controller;
use App\Models\Creditor;
use Illuminate\Http\Request;

class CreditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['creditor']=Creditor::all();
        return response()->json([
            'status'=> true,
            'message'=>'All creditors Data',
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
                'company_name'=>'required',
                'address'=>'required',
                  'city'=>'required',
                 'state'=>'required',
                 'zip'=>'required',
                 'phone_number'=>'required',
                 'extensions'=>'required',
                 'account_type'=>'required',
                 'fax_number'=>'required'
            ]
            );
            if($validateuser->fails()){
                return response()->json([
                    'status'=> false,
                    'message'=>'Validation Error',
                    'errors'=>$validateuser->errors()->all(),
                ],401);
            }
            
            $creditor=Creditor::Create([
                'company_name' => $request ->company_name,
                'address'=> $request ->address,
                'city'=> $request ->city,
                'state'=> $request ->state,
                'zip'=> $request ->zip,
                'phone_number'=> $request ->phone_number,
                'extensions'=> $request ->extensions,
                'account_type'=> $request ->account_type,
                'fax_number'=> $request ->fax_number,
               
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Creditor Created Successfully',
                'creditor'=>$creditor,
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['creditor'] = Creditor::select(
            'id',
            'company_name',
            'address',
            'city',
            'state',
            'zip',
            'phone_number',
            'extensions',
            'account_type',
            'fax_number'
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single creditor of given id',
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
                'company_name'=>'required',
                'address'=>'required',
                'city'=>'required',
                'state'=>'required',
                'zip'=>'required',
                'phone_number'=>'required', 
                'extensions'=>'required',
                'account_type'=>'required',
                'fax_number'=>'required'
            ]
            );
            if($validateuser->fails()){
                return response()->json([
                    'status'=> false,
                    'message'=>'Validation Error',
                    'errors'=>$validateuser->errors()->all(),
                ],401);
            }
            
            $creditor = Creditor::where(['id'=>$id])->update([
                'company_name' => $request ->bureau_name,
                'address'=> $request ->address,
                'city'=> $request ->city,
                'state'=> $request ->state,
                'zip'=> $request ->zip,
                'phone_number'=> $request ->phone_number, 
                'extensions'=> $request ->extensions,
                'account_type'=> $request ->account_type,
                'fax_number'=> $request ->fax_number,
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Creditor updated Successfully',
                'creditor'=>$creditor,
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $creditor= Creditor::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Creditor deleted Successfully',
               'creditB'=>$creditor,
           ],200);
    }
}
