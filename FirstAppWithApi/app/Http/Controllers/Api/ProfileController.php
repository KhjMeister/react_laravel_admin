<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    public function userProfile() {
        return response()->json(auth('api')->user());
    }

    public function updateProfile(Request $request,$id)
    {
        // $userss = User::findOrFail($id);
        $userss = auth('api')->user();
        $name = $request->input('name');
        $family = $request->input('family');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');

        $userss->name = $name;
        $userss->family = $family;
        $userss->email = $email;
        $userss->password = Hash::make($password);
        $userss->phone = $phone;

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'phone' => 'required|digits:11',
        ]);
        

        if ($validator->fails())
        {
            return response()->json($validator->errors()->toJson(), 500);
        }else{
            // $userss->update($request->all());
            $userss->save();
            return response()->json(['user' => $userss], 200);
        }
        
    }
}
