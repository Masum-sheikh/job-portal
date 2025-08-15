<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Job;
use App\Models\Application;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Jobseeker Dashboard (user-access:user)
    public function index(): View
    {
        $jobs = Job::where('status', 'open')
            ->latest()
            ->get();

        $applications = Application::with('job')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('home', compact('jobs', 'applications'));
    }

    // Admin Dashboard (user-access:admin)
    public function adminHome(): View
    {
        $users = User::latest()->get();
        $jobs  = Job::with('employer')->latest()->get();

        return view('adminHome', compact('users', 'jobs'));
    }

    // Employer Dashboard (user-access:employee)
    public function employeeHome(): View
    {
        $jobs = Job::where('employer_id', auth()->id())
            ->withCount('applications')
            ->latest()
            ->get();

        return view('employeeHome', compact('jobs'));
    }
    //user delete
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->back()->with('success', 'User deleted successfully.');
}
  public function delete($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->back()->with('success', 'User deleted successfully.');
}

}
