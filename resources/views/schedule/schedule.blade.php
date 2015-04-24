@extends('master')

@section('content')

    <h1 class="heading-style">Maintenance Schedule</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <th>Vehicle</th>
        <th>Date</th>
        <th>Type</th>
        <th>Months</th>
        <th>Miles</th>
        </thead>
        <tbody>
        @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->vehicle->vehicle }}</td>
                <td>{{ $schedule->created_at->format('l, m-d-Y') }}</td>
                <td>{{ $schedule->maintenance_type->type }}</td>
                <td>{{ $schedule->interval_months }} months</td>
                <td>{{ $schedule->interval_distance }} miles</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection