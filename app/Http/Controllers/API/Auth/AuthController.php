<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends AppBaseController
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('LAKHPATI')->accessToken;

            $data = [
                'token' => $token,
                'user' => $user
            ];

            return $this->sendDataResponse($data);
        }

        return $this->sendError(['Unauthorized'], 422);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'nullable|email|unique:users',
            'phone' => 'nullable|unique:users',
            'password' => 'required|min:6',
        ]);

        $validator->sometimes('email', 'required_without:phone', function ($input) {
            return empty($input->phone);
        });
    
        $validator->sometimes('phone', 'required_without:email', function ($input) {
            return empty($input->email);
        });

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('MyApp')->accessToken;

        $data = [
            'token' => $token,
            'user' => $user
        ];
        
        return $this->sendDataResponse($data);
    }
}