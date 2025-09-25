<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['instruction'] = Instruction::all();
        return response()->json([
            'status' => true,
            'message' => 'All instructions Data',
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
                'group' => 'required',
                'name' => 'required',
                'is_child' => 'required'
            ]
        );
        if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateuser->errors()->all(),
            ], 401);
        }
        $instruction=Instruction::Create([
            'group'=>$request->group,
            'name' => $request ->name,
            'is_child'=> $request ->is_child,
   
        ]);
        return response()->json([
            'status'=> true,
            'message'=>'Instruction Created Successfully',
            'instruction'=>$instruction,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['instruction'] = Instruction::select(
            'id',
            'group',
            'name',
            'is_child'
        )->where(['id'=>$id])->get();
        return response()->json([
            'status'=> true,
            'message'=>'Single instruction data of given id',
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
                'group' => 'required',
                'name' => 'required',
                'is_child' => 'required',
            ]
        ); 
         if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateuser->errors()->all(),
            ], 401);
        }
        $instruction=Instruction::Create([
            'group' => $request ->group,
            'name' => $request ->name,
            'is_child'=> $request ->is_child,
   
        ]);
        return response()->json([
            'status'=> true,
            'message'=>'Instruction Created Successfully',
            'instruction'=>$instruction,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instruction=Instruction::where('id',$id)->delete();
        return response()->json([
               'status'=> true,
               'message'=>'Instruction deleted Successfully',
               'instruction'=>$instruction,
           ],200);
    }
}
