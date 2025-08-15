@extends('layouts.pofile')

@section('maincontent')
<div class="container mt-4">
    <h2>Admin Dashboard</h2>

    {{-- User Management --}}
    <div class="card mb-4">
        <div class="card-header">All Users</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                           <td>
                         {{ $user->type }}

                        </td>

                            <td>{{ $user->created_at->format('d M Y') }}</td>
                           <td>
    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this user?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- All Jobs --}}
    <div class="card">
        <div class="card-header">All Jobs</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Employer</th>
                        <th>Status</th>
                        <th>Posted At</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            {{-- <td>{{ $job->user->name }}</td> --}}
                           <td>{{ optional($job->employer)->name ?? 'Unknown Employer' }}</td>


                            <td>{{ ucfirst($job->status) }}</td>
                             <td>
    <form action="{{ route('admin.job.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this user?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</td>
                            <td>{{ $job->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
