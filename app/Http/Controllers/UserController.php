<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
            'code'=>200,
            'success'=>true,
            'message'=>'Data fetched',
            'data'=>$user
        ],200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:2|max:255',
            'email'=>'email|required|min:2|max:255',
            'password'=>'required|min:3|max:255'
        ]);
        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'code'=>400,
                'message'=>'Validasi Error',
                'errors'=>$validator->errors()
            ],400);
        }
        $inputs = $validator->validated();
        $inputs['password'] = Hash::make($inputs['password']);
        User::create($inputs);
        return response()->json([
            'success'=>true,
            'code'=>200,
            'message'=>'Data baru berhasil ditambahkan',
            
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json([
            'success'=>true,
            'code'=>200,
            'message'=>'Data Founded',
            'data'=>$user
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:3|max:255',
            'email'=>'required|email|min:2|max:255'
        ]);
        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'code'=>'400',
                'message'=>'Validation Error',
                'errors'=>$validator->errors()
            ],400);
        }
        $user->update($validator->validated());
        return response()->json([
            'success'=>true,
            'code'=>200,
            'message'=>'Data Updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'success'=>true,
            'code'=>200,
            'message'=>'Data Berhasil di hapus',
        ]);
    }
}
