<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends AppBaseController{
    
    public function createComplaint(Request $request)
    {

        $request->validate([
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

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('complaint_images');
        }

        $data = $request->all();
        if ($imagePath) {
            $data['image'] = $imagePath;
        }
        $data['status'] = "pending";

        Complaint::create($data);
        return $this->sendSuccess('Complaint created successfully');
    }

    public function assignedComplaints(Request $request) {
        $contractor = auth()->user()->contractor;

        if(!$contractor){
            return $this->sendError("contractor not found!");
        }

        $complaints = $contractor->complaints;

        return $this->sendDataResponse($complaints);
    }
    
    public function closeComplaint(Request $request) {
        $request->validate([
            'complaint_id' => 'required|exists:complaints,id',
        ]);
        $id = $request->complaint_id;
        $complaint = Complaint::find($id);

        if(!$complaint){
            return $this->sendError("complaint not found");
        }

        $complaint->status = "closed";
        $complaint->save();

        return $this->sendSuccess("Complaint status updated successfully!");
    }

}
