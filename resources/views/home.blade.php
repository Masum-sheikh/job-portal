@extends('layouts.pofile')

@section('maincontent')
<div class="container mt-4">
    <h2 class="mb-4">Jobseeker Dashboard</h2>

    {{-- Profile Update Form --}}
    <div class="card mb-4">
        <div class="card-header">Update Profile</div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email (Read Only)</label>
                    <input type="email" value="{{ Auth::user()->email }}" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label>Upload Resume (PDF/DOC)</label>
                    <input type="file" name="resume" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Profile Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>

    {{-- Job Listings --}}
    <div class="card mb-4">
        <div class="card-header">Browse Jobs</div>
        <div class="card-body">
            @foreach($jobs as $job)
                <div class="border p-3 mb-3">
                    <h5>{{ $job->title }}</h5>
                    <p>{{ $job->description }}</p>
                    <form action="{{ route('jobs.apply', $job->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Apply</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Applied Jobs --}}
    <div class="card">
        <div class="card-header">My Applications</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $app)
                        <tr>
                            <td>{{ $app->job->title }}</td>
                            <td>{{ ucfirst($app->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
