@extends('master')

@section('content')

    <h1 class="heading-style">Add New Vehicle</h1>

    {!! Form::open(['action' => 'VehicleController@store']) !!}
    <div class="form-group">

        {!! Form::label('vehicle_name', 'Vehicle name:') !!}
        {!! Form::text('vehicle_name', '2013 Subaru Impreza WRX', ['class' => 'form-control']) !!}

        <br>
        {!! Form::submit('Add Vehicle', ['class' => 'btn btn-primary form-control']) !!}

    </div>
    {!! Form::close() !!}

    @include('errors.list')
@endsection

