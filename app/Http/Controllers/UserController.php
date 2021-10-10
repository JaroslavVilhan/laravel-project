<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $inputs = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $inputs['email'])->first();

        if(!$user || !Hash::check($inputs['password'], $user->password)){
            return response('Unauthorized', 401)
                ->header('Content-Type', 'text/plain');
        }

        $token = $user->createToken('userToken')->plainTextToken;

        return response($token, 200)
            ->header('Content-Type', 'text/plain');
    }

    public function index()
    {
        $id = auth()->user()->id;
        $data = User::where('id', $id)
            ->get();
        return response()->json($data, 200);

    }
}
