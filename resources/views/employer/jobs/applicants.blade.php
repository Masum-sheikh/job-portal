@extends('layouts.pofile')

@section('maincontent')
<div class="container mt-4">
    <h2>Applicants for: </h2>

    <div class="card">
        <div class="card-header">Applicants List</div>
        <div class="card-body">
            @if($applications->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Applicant Name</th>
                            <th>Email</th>
                            <th>Resume</th>
                            <th>Applied Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($applications as $application)
<tr>
    <td>{{ optional($application->user)->name ?? 'No Name' }}</td>
    <td>{{ optional($application->user)->email ?? 'No Email' }}</td>
   <td>
    @if(optional($application->user)->resume)
        <a href="{{ asset('storage/' . $application->user->resume) }}" target="_blank" class="btn btn-sm btn-info">View Resume</a>
    @else
        No Resume
    @endif
</td>


    <td>{{ $application->created_at->format('d M, Y') }}</td>
</tr>
@endforeach

                    </tbody>
                </table>
            @else
                <p>No applicants yet.</p>
            @endif
        </div>
    </div>

    <a href="{{ route('employee.home') }}" class="btn btn-secondary mt-3">Back to My Jobs</a>
</div>
@endsection

