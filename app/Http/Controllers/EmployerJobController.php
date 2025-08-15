<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use App\Models\Application;
use Illuminate\Http\Request;

class EmployerJobController extends Controller
{
    public function index()
    {
        // $employer = User::where('user_id', auth()->id())->first();
         $employer = auth()->user();
        $jobs = Job::where('employer_id', $employer->id)->get();
        return view('employer.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('employer.jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'nullable|string|max:255',
        ]);

        // $employer = User::where('user_id', auth()->id())->first();
    $employer = auth()->user();

        Job::create([
            'employer_id' => $employer->id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'status' => 'open',
        ]);

        return redirect()->route('employee.home')->with('success', 'Job created successfully.');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('employer.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $job->update($request->only('title', 'description', 'location'));

        // return redirect()->route('employer.jobs.edit')->with('success', 'Job updated successfully.');
         return redirect()
        ->route('employer.jobs.edit', ['job' => $job->id])
        ->with('success', 'Job updated successfully.');
    }

    public function destroy($id)
    {
        Job::destroy($id);
        return redirect()->route('employee.home')->with('success', 'Job deleted successfully.');
    }

    public function applicants($id)
    {
        $applications = Application::with('user')->where('job_id', $id)->get();
        return view('employer.jobs.applicants', compact('applications'));
    }

    // public function updateStatus(Request $request, $id)
    // {
    //     $job = Job::findOrFail($id);
    //     $job->status = $request->status;
    //     $job->save();
    //     return back()->with('success', 'Job status updated.');
    // }

    public function updateStatus(Request $request, $id)
{
    $job = Job::findOrFail($id);
    $job->status = $request->status; // now this will not be null
    $job->save();

    return back()->with('success', 'Job status updated.');
}

}
