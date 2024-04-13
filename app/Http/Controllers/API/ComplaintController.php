<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Complaint;
use App\Models\ComplaintDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends AppBaseController{
    
    public function createComplaint(Request $request) {
        $request->validate([
            'post_no' => 'required|string',
            'post_address' => 'required|string',
            'type_of_fault' => 'required|string',
            'date_of_complaint' => 'nullable|string',
            'complainant_name' => 'nullable|string',
            'complaint_rut' => 'nullable|string',
            'phone' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5256',
            'comuna' => 'required|exists:comuna,id',
            'sector' => 'required|exists:sectors,id',
            'population' => 'required|exists:population,id',
            //Additional parameters added on 13th APRIL
            'address' => 'nullable|string',
            'lat' => 'nullable|string',
            'long' => 'nullable|string',
        ]);

        // Check if a similar complaint already exists in the database
        $existingComplaint = Complaint::where([
            'comuna' => $request->comuna,
            'sector' => $request->sector,
            'population' => $request->population,
        ])->where("status",'!=',"closed")->first();

        // If a similar complaint exists, return a message
        if ($existingComplaint) {
            return $this->sendError(__('We have already received a complaint about this problem. Thank you for your feedback!'));
        }

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
        return $this->sendSuccess(__('Complaint created successfully'));
    }

    public function assignedComplaints(Request $request) {
        $contractor = auth()->user()->contractor;

        if(!$contractor){
            return $this->sendError("contractor not found!");
        }

        $complaints = $contractor->openComplaints;

        return $this->sendDataResponse($complaints);
    }
    
    public function closeComplaint(Request $request) {
        $request->validate([
            'complaint_id' => 'required|exists:complaints,id',
            'update_remarks' => 'required',
            'proof_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5256',
        ]);
        $user = auth()->user();
        $id = $request->complaint_id;
        $update_remarks = $request->update_remarks;
        $image = $request->image;
        $complaint = Complaint::where('id',$id)->where('contractor_id',$user->contractor->id)->first();

        if(!$complaint){
            return $this->sendError("complaint not found");
        }

        $complaint->status = "closed";
        $complaint->save();

        // CONTRACTOR REMARKS:BEGINS
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('complaint_remark_images');
        }

        $data = $request->all();
        if ($imagePath) {
            $data['image'] = $imagePath;
        }
        $data['update_remarks'] = $update_remarks;
        $data['complaint_id'] = $complaint->id;
        $complaintDetails = $complaint->complaintDetails;
        if($complaintDetails){
            $complaintDetails->update_remarks = $update_remarks;
            $complaintDetails->image = $imagePath;
        }else{
            ComplaintDetails::create($data);
        }
        // CONTRACTOR REMARKS:ENDS

        return $this->sendSuccess("Complaint status updated successfully!");
    }

}
