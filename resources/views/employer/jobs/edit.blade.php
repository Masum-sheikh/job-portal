@extends('layouts.pofile')

@section('maincontent')
<div class="container mt-4">
    <h2>Edit Job</h2>

    <div class="card">
        <div class="card-header">Update Job Details</div>
        <div class="card-body">
            <form action="{{ route('employer.jobs.update', $job->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Job Title</label>
                    <input type="text" name="title" value="{{ old('title', $job->title) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $job->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="open" {{ $job->status == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="closed" {{ $job->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update Job</button>
                <a href="{{ route('employee.home') }}" class="btn btn-secondary">Cancel</a>
               
            </form>
        </div>
    </div>
</div>
@endsection
