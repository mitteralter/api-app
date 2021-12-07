<?php

namespace App\Http\Controllers;




use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    //
    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'state_id' => 'integer'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'state_id' => $request->state_id,
        ]);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Inicio de sesión y creación de token
     */
    public function login(Request $request)
    {
       
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }


   

    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request)
    {
        
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Obtener el objeto User como json
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}

/* 
Client ID: 950c5633-bec6-4a7e-9719-57ef4bcc81fd
Client secret: jdUpuD05FGtMXMl8CdQM0ji6PhoQvK6KkA9mbjh5
Password grant client created successfully.
Client ID: 950c5633-da3c-4be3-bf3f-d8fc38fe8835
Client secret: QNJ7Kozw6kTqcQEBFlfG7KfczGEUdZOr8bikZW4M 
Personal access client created successfully.
Client ID: 950c5d91-70ea-4135-ad79-18519c712d6c        
Client secret: m3sQckJzP9r3LcOyQxz5KTttEVli05StGCahE8hn

*/