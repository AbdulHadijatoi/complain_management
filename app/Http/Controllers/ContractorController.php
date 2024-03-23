<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ContractorController extends Controller
{
    // create contractor
    public function createContractor(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        //assign role contractor

        return redirect(route('contractorsList'))->withSuccess("contractor added successfully");
    }

    public function editContractor($id)
    {
        $user = User::find($id);

        if(!$user){
            return redirect()->back()->withErrors("Contractor not found");
        }

        return view('dashboard.contractors/edit',$user);
    }
    public function updateContractor(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        return redirect(route('contractorsList'))->withSuccess("contractor added successfully");
    }

}
