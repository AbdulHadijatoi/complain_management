<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintStatus;
use App\Models\Comuna;
use App\Models\Contractor;
use App\Models\Participant;
use App\Models\Population;
use App\Models\Sector;
use App\Models\TypeOfFault;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'perPage' => 'nullable',
            'search' => 'nullable'
        ]);
        
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');
        $contractors = Contractor::with('user')->get();
        $complaints = Complaint::with('contractor')->orderBy('id','desc')
                        ->when($search, function ($query) use ($search) {
                            $query->where('post_no', 'like', "%$search%")
                                  ->orWhere('post_address', 'like', "%$search%")
                                  ->orWhere('complainant_name', 'like', "%$search%");
                        })
                        ->paginate($perPage);
        return view('admin.complaints.index',compact('complaints','contractors'));
    }
    
    public function filteredList(Request $request,$status)
    {
        $request->validate([
            'perPage' => 'nullable',
            'search' => 'nullable'
        ]);
        
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');
        $contractors = Contractor::with('user')->get();
        $complaints = Complaint::with('contractor')->orderBy('id','desc')
                        ->where("status",$status)
                        ->when($search, function ($query) use ($search) {
                            $query->where('post_no', 'like', "%$search%")
                                  ->orWhere('post_address', 'like', "%$search%")
                                  ->orWhere('complainant_name', 'like', "%$search%");
                        })
                        ->paginate($perPage);

        return view('admin.complaints.index',compact('complaints','contractors'));
    }
    
    public function create(Request $request){
        $comunas = Comuna::get(['id','name'])->toArray();
        $populations = Population::get(['id','name'])->toArray();
        $sectors = Sector::get(['id','name'])->toArray();
        $type_of_faults = TypeOfFault::get(['id','name'])->toArray();
    }

    public function store(Request $request)
    {
        $request->validate([
            'contractor_id' => 'nullable|exists:contractors,id',
            'post_no' => 'required|string',
            'post_address' => 'nullable|string',
            'type_of_fault' => 'nullable|string',
            'date_of_complaint' => 'nullable|string',
            'complainant_name' => 'nullable|string',
            'complaint_rut' => 'nullable|string',
            'phone' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'comuna' => 'nullable|string',
            'sector' => 'nullable|string',
            'population' => 'nullable|string',
        ]);

        $data = $request->except('_token', 'image');
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('complaint_images');
            $data['image'] = $imagePath;
        }

        $contractor_id = $request->contractor_id;
        if($contractor_id){
            $data['status'] = 'open';
        }else{
            $data['status'] = 'pending';
        }

        Complaint::create($data);

        return redirect()->route('listComplaints')->with('success', 'Complaint created successfully');
    }

    public function show($id)
    {
        $complaint = Complaint::with('contractor')->where('id',$id)->first();
        return view('admin.complaints.show', compact('complaint'));
    }

    public function edit($id)
    {
        $complaint = Complaint::findOrFail($id);
        $comunas = Comuna::pluck('name', 'id')->toArray();
        $populations = Population::pluck('name', 'id')->toArray();
        $sectors = Sector::pluck('name', 'id')->toArray();
        $type_of_faults = TypeOfFault::pluck('name', 'id')->toArray();
        $statuses = ComplaintStatus::get(['name', 'id','code']);
        // return $statuses;
        return view('admin.complaints.edit', compact('complaint', 'comunas', 'populations', 'sectors', 'type_of_faults','statuses'));
    }

    public function update(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);

        $request->validate([
            'contractor_id' => 'nullable|exists:contractors,id',
            'post_no' => 'required|string',
            'post_address' => 'nullable|string',
            'type_of_fault' => 'nullable|string',
            'date_of_complaint' => 'nullable|string',
            'complainant_name' => 'nullable|string',
            'complaint_rut' => 'nullable|string',
            'phone' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'comuna' => 'nullable|string',
            'sector' => 'nullable|string',
            'population' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $data = $request->except('_token', 'image');
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('complaint_images');
            $data['image'] = $imagePath;
        }

        $complaint->update($data);

        return redirect()->route('listComplaints')->with('success', 'Complaint updated successfully');
    }

    public function assignToContractor(Request $request)
    {

        $complaint = Complaint::where('id',$request->complaint_id)->first();
        if($complaint){
            $complaint->contractor_id = $request->contractor_id;
            $complaint->status = 'open';
            $complaint->save();

        }

        return redirect()->route('listComplaints')->with('success', 'Complaint deleted successfully');
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();

        return redirect()->route('listComplaints')->with('success', 'Complaint deleted successfully');
    }
}
