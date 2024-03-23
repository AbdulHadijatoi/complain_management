<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');

        $contests = Contest::with('contestDetails')
                    ->when($search, function ($query) use ($search) {
                        $query->where('winner_prize', 'like', "%$search%")
                              ->orWhere('runner_up_prize', 'like', "%$search%");
                    })
                    ->paginate($perPage);

        return view('admin.contests.list', compact('contests'));
    }

    public function show($id)
    {
        $contest = Contest::with("contestDetails")->find($id);
        abort_if(!$contest, 404, "Contest not found");

        return view('admin.contests.show', compact('contest'));
    }

    public function create()
    {
        return view('admin.contests.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'winner_prize' => 'required',
            'runner_up_prize' => 'required',
            // Add more validation rules as needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contest = Contest::create($request->only('winner_prize', 'runner_up_prize'));

        $contest->contestDetails()->create($request->only('total_winners', 'total_runner_ups', 'participants_limit', 'start_date', 'end_date', 'entry_fee'));

        return redirect()->route('listContests')->with('success', 'Contest created successfully!');
    }

    public function edit($id)
    {
        $contest = Contest::with("contestDetails")->find($id);
        abort_if(!$contest, 404, "Contest not found");

        return view('admin.contests.edit', compact('contest'));
    }

    public function update(Request $request, $id)
    {
        $contest = Contest::with("contestDetails")->find($id);
        abort_if(!$contest, 404, "Contest not found");

        $contest->update($request->only('winner_prize', 'runner_up_prize'));
        
        $contestDetails = $contest->contestDetails;
        $contestDetails->update($request->only('total_winners', 'total_runner_ups', 'participants_limit', 'start_date', 'end_date', 'entry_fee'));

        return redirect()->route('listContests')->with('success', 'Contest updated successfully!');
    }

    public function confirmDelete($id)
    {
        $contest = Contest::with("contestDetails")->find($id);
        abort_if(!$contest, 404, "Contest not found");

        return view('admin.contests.confirm-delete', compact('contest'));
    }

    public function destroy($id)
    {
        $contest = Contest::find($id);
        abort_if(!$contest, 404, "Contest not found");

        $contest->contestDetails()->delete();
        $contest->delete();

        return redirect()->route('listContests')->with('success', 'Contest deleted successfully!');
    }
}
