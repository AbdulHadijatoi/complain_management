<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ContractorController extends Controller
{
    // create contractor
    public function listContractors(Request $request){
        $perPage = $request->perPage?? 10;
        $contractors = Contractor::orderBy('id','desc')->paginate($perPage); // You can specify the number of items per page (e.g., 10)

        return view('admin.contractors.index', compact('contractors'));
    }

    public function createContractor(Request $request)
    {
        return view('admin.contractors.create');
    }
    public function storeContractor(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        //assign role contractor
        $user->assignRole('contractor');

        $contractor = $user = Contractor::create([
            'user_id'=>$user->id,
            'status' => 1,
        ]);


        return redirect(route('listContractors'))->withSuccess("contractor added successfully");
    }

    public function editContractor($id)
    {
        $contractor = Contractor::with('user')->where('id',$id)->first();

        if(!$contractor){
            return redirect()->back()->withErrors("Contractor not found");
        }

        return view('admin.contractors/edit',compact('contractor'));
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
