<?php


namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Http\Controllers\Controller;

use App\Models\FreezeBureau;
use Illuminate\Http\Request;

class FreezeBureauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['freezeB']=FreezeBureau::all();
        return response()->json([
            'status'=> true,
            'message'=>'All freeze Bureau Data',
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
            
            $freezeB= FreezeBureau::Create([
                'company_name' => $request ->bureau_name,
                'address'=> $request ->address,
                'city'=> $request ->city,
                'state'=> $request ->state,
                'zip'=> $request ->zip,
                'phone_number'=> $request ->phone_number,
               
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Freeze Bureau Created Successfully',
                'freezeB'=>$freezeB,
            ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['freezeB'] = FreezeBureau::select(
            'id',
            'company_name',
            'address',
            'city',
            'state',
            'zip',
            'phone_number'
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single freeze Bureau of given id',
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
            
            $freezeB = FreezeBureau::where(['id'=>$id])->update([
                'company_name' => $request ->bureau_name,
                'address'=> $request ->address,
                'city'=> $request ->city,
                'state'=> $request ->state,
                'zip'=> $request ->zip,
                'phone_number'=> $request ->phone_number, 
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Freeze Bureau updated Successfully',
                'freezeB'=>$freezeB,
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $freezeB= FreezeBureau::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Freeze bureau deleted Successfully',
               'creditB'=>$freezeB,
           ],200);
    }
}
