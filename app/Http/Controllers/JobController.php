<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::where('status', 'open')->latest()->paginate(10);
        return view('jobs.index', compact('jobs'));
    }
    //search job
    public function serch(Request $request)
{
    $query = Job::where('status', 'open');

    if ($request->filled('keyword')) {
        $query->where('title', 'LIKE', '%' . $request->keyword . '%');
    }

    $jobs = $query->latest()->paginate(10);

    return view('welcome', compact('jobs'));
}

}

