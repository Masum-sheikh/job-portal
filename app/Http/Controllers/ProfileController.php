<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('jobseeker.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;

        if ($request->hasFile('resume')) {
            $resumeName = time().'.'.$request->resume->extension();
            $request->resume->move(public_path('resumes'), $resumeName);
            $user->resume = 'resumes/'.$resumeName;
        }

        if ($request->hasFile('photo')) {
           
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('photos'), $photoName);
            $user->photo = 'photos/'.$photoName;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }
}

