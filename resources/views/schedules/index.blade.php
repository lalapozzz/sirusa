@extends('layouts.sidebar')
@section('container')

@if (session()->has("successMessage"))
    <div class="alert alert-success">
        {{ session("successMessage") }}
    </div>
@endif

@if (session()->has("errorMessage"))
    <div class="alert alert-danger">
        {{ session("errorMessage") }}
    </div>
@endif

<a href="{{ route('schedules.create') }}" class="btn btn-success mb-3">Add</a>
<table id="datatable1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="5%">Id</th>
            <th>Doctor Name</th>
            <th>Day</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($schedules as $index => $schedule)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $schedule->doctor->name }}</td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->start_time }}</td>
                <td>{{ $schedule->end_time }}</td>
                <td class="align-middle text-center">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this schedule?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
