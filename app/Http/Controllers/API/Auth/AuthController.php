<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends AppBaseController
{
    public function contractorLogin(Request $request)
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

            if(!$user->isContractor()){
                return $this->sendError('Unauthorized');
            }

            $token = $user->createToken('COMPLAINTSYSTEM')->accessToken;

            $data = [
                'token' => $token
            ];

            return $this->sendDataResponse($data);
        }

        return $this->sendError(['Unauthorized'], 422);
    }

}