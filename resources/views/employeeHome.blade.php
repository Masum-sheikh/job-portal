@extends('layouts.pofile')

@section('maincontent')
<div class="container mt-4">
    <h2>Employer Dashboard</h2>

    {{-- Create Job Form --}}
    <div class="card mb-4">
        <div class="card-header">Post a Job</div>
        <div class="card-body">
            <form action="{{ route('employer.jobs.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Job Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Post Job</button>
            </form>
        </div>
    </div>

    {{-- My Jobs --}}
    <div class="card">
        <div class="card-header">My Posted Jobs</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Status</th>
                        <th>Applicants</th>
                        <th>Actions</th>
                        <th>Status update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            {{-- <td>{{ ucfirst($job->status) }}</td> --}}
                            <td> @if($job->status === 'open')
        <button type="submit" class="btn btn-sm btn-warning">Open</button>
    @else
        <button type="submit" class="btn btn-sm btn-success">close</button>
    @endif</td>


                            <td>
                                <a href="{{ route('employer.jobs.applicants', $job->id) }}" class="btn btn-info btn-sm">
                                    View ({{ $job->applications_count }})
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('employer.jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('employer.jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                                </form>


             </td>
       <td>
 <form action="{{ route('employer.jobs.status', $job->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('PUT')
    <input type="hidden" name="status" value="{{ $job->status === 'open' ? 'closed' : 'open' }}">
    @if($job->status === 'open')
        <button type="submit" class="btn btn-sm btn-warning">Close</button>
    @else
        <button type="submit" class="btn btn-sm btn-success">Open</button>
    @endif
</form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
