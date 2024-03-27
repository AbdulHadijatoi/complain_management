<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard(Request $request) {
        // Count complaints for each status
        $counts = DB::table('complaints')
                    ->select('status', DB::raw('count(*) as count'))
                    ->groupBy('status')
                    ->whereNull('deleted_at')
                    ->get();
    
        // Initialize counts array with default values
        $complaintCounts = [
            'open' => 0,
            'pending' => 0,
            'closed' => 0,
            'rejected' => 0,
        ];
    
        // Iterate through the counts and update the counts array
        foreach ($counts as $count) {
            $complaintCounts[$count->status] = $count->count;
        }
    
        // Fetch the latest pending complaints (optional)
        $latestPendingComplaints = Complaint::orderBy('id', 'desc')
                                        ->where('status', 'pending')
                                        ->limit(10)
                                        ->get();
    
        return view('dashboard', compact('complaintCounts', 'latestPendingComplaints'));
    }
}
