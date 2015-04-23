@extends('master')

@section('content')

    <h1 class="heading-style">Input Schedule</h1>

    {!! Form::open(['action' => 'MaintenanceScheduleController@store']) !!}
    <div class="form-group">

        {!! Form::label('vehicle_id', 'Vehicle:') !!}
        {!! Form::select('vehicle_id',$vehicles, null, ['class' => 'form-control']) !!}

        {!! Form::label('maint_type_id', 'Maintenance Type:') !!}
        {!! Form::select('maint_type_id',$maintenance_types, null, ['class' => 'form-control']) !!}

        {!! Form::label('interval_distance', 'Service Mileage Interval:') !!}
        {!! Form::text('interval_distance', null, ['class' => 'form-control']) !!}

        {!! Form::label('interval_months', 'Service Month Interval:') !!}
        {!! Form::text('interval_months', null, ['class' => 'form-control']) !!}
        <br>
        {!! Form::submit('Create Scheduled Maintenance', ['class' => 'btn btn-primary form-control']) !!}

    </div>
    {!! Form::close() !!}

    @include('errors.list')

@endsection

