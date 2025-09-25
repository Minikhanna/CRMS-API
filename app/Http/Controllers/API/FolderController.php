<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['folder']=Folder::all();
        return response()->json([
            'status'=> true,
            'message'=>'All Folder Data',
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
            
            $folder= Folder::Create([
                'name' => $request ->name,
                'user_id'=> $request ->user_id,
               
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Folder Created Successfully',
                'folder'=>$folder,
            ],200);
    } 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['folder'] = Folder::select(
            'id',
            'name',
            'user_id',
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single Folder of given id',
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
            
            $folder = Folder::where(['id'=>$id])->update([
                'name' => $request->name,
                'user_id'=> $request->user_id, 
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'Folder updated Successfully',
                'folder'=>$folder,
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $folder = Folder::where('id',$id)->delete();
         return response()->json([
                'status'=> true,
                'message'=>'Folder deleted Successfully',
                'folder'=>$folder,
            ],200);
    }
}
