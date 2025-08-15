<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store($id)
    {
        $job = Job::findOrFail($id);
        $user = auth()->user();

        $alreadyApplied = Application::where('job_id', $job->id)
            ->where('user_id', $user->id)
            ->exists();

        if ($alreadyApplied) {
            return back()->with('error', 'You have already applied for this job.');
        }

        Application::create([
            'job_id' => $job->id,
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Application submitted successfully.');
    }

    public function index()
    {
        $applications = Application::with('job')->where('employer_id', auth()->id())->get();
        return view('jobseeker.applications', compact('applications'));
    }
}

