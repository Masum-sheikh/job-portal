<?php
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmployerJobController;

// Jobseeker Routes
Route::middleware(['auth','verified','user-access:user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Browse jobs
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::post('/jobs/{id}/apply', [ApplicationController::class, 'store'])->name('jobs.apply');

    // View applied jobs
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
});

//job crude+applying
Route::middleware(['auth','verified','user-access:employee'])->group(function () {
    // Route::resource('/employer/jobs', EmployerJobController::class);
     Route::resource('employer/jobs', EmployerJobController::class)
         ->names([
             'index' => 'employer.jobs.index',
             'create' => 'employer.jobs.create',
             'store' => 'employer.jobs.store',
             'show' => 'employer.jobs.show',
             'edit' => 'employer.jobs.edit',
             'update' => 'employer.jobs.update',
             'destroy' => 'employer.jobs.destroy',
         ]);
    Route::get('/employer/jobs/{id}/applicants', [EmployerJobController::class, 'applicants'])->name('employer.jobs.applicants');
    Route::put('/employer/jobs/{id}/status', [EmployerJobController::class, 'updateStatus'])->name('employer.jobs.status');
});



// Home Page
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $jobs = Job::where('status', 'open')
               ->latest()
               ->paginate(10);

    return view('welcome', compact('jobs'));
});
// Auth routes with email verification
Auth::routes(['verify' => true]);

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('resent', true);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Normal user routes or jobseker
Route::middleware(['auth', 'verified', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Admin routes
Route::middleware(['auth','verified', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

// employee routes

// Route::middleware(['auth','verified', 'user-access:manager'])->group(function () {
//     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
// });

 Route::middleware(['auth','verified', 'user-access:employee'])->group(function () {
    Route::get('/employee/home', [HomeController::class, 'employeeHome'])->name('employee.home');
 });
//user delete
Route::delete('/admin/users/{id}', [HomeController::class, 'destroy'])->name('admin.users.destroy');
Route::delete('/admin/delete/{id}', [HomeController::class, 'delete'])->name('admin.job.destroy');
//job serach
Route::get('/jobs', [JobController::class, 'serch'])->name('jobs.serch');

