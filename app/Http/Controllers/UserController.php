<?php

namespace App\Http\Controllers;

use App\User;
use App\Helpers\Token;
use \Firebase\JWT\JWT;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->save();
        
        $token = new Token($users->email);
        $coded_token = $token->encode();

        //$token = JWT::encode($token_data, $key);
        return response()->json([
        
            "token" => $coded_token
        
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function login(Request $request)
    {   
        $user = User::where('email', '=', $request->email)->first();
        
        if($user->password == $request->password)
        {
            
            $token = new Token($user->email);
            $coded_token = $token->encode();

            return response()->json([
        
                "token" => $coded_token
            
            ], 201);
   

        }else{

            return response()->json([

                "Error" => "No autorizado"

            ], 401 );

        }
  
    }

}
