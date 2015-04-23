@extends('master')

@section('content')

    <h1 class="heading-style">Maintenance Logs</h1>

    <table class="table table-striped table-bordered">
        <thead>
            <th>Date</th>
            <th>Mileage</th>
            <th>Type</th>
            <th>cost</th>
            <th>Vehicle</th>
            <th>Comments</th>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->created_at->format('l, m-d-Y') }}</td>
                <td>{{ $log->mileage }} miles</td>
                <td>{{ $log->maintenance_type->type }}</td>
                <td>${{ $log->cost }}</td>
                <td>{{ $log->vehicle->vehicle }}</td>
                <td>{{ $log->comment }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection