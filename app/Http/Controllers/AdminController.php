<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard(Request $request) {
        $complaints = Complaint::orderBy('id','desc')
                        ->where('status','pending')
                        ->limit(10)
                        ->get();
                        
        return view('dashboard', compact('complaints'));
    }
}
