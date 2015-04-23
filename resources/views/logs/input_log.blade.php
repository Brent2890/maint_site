@extends('master')

@section('content')

    <h1 class="heading-style">Input Maintenance</h1>

    {!! Form::open(['action' => 'MaintenanceLogController@store']) !!}

    <div class="form-group">

        {!! Form::label('vehicle', 'Vehicle:') !!}
        {!! Form::select('vehicle_id',$vehicles, null, ['class' => 'form-control']) !!}

        {!! Form::label('maintenance_type', 'Maintenance Type:') !!}
        {!! Form::select('maintenance_type_id',$maintenance_types, null, ['class' => 'form-control']) !!}

        {!! Form::label('mileage', 'Total Mileage:') !!}
        {!! Form::text('mileage', null, ['class' => 'form-control']) !!}

        {!! Form::label('cost', 'Cost:') !!}
        {!! Form::text('cost', '$', ['class' => 'form-control']) !!}

        {!! Form::label('comment', 'Comments:') !!}
        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}

        <br>

        {!! Form::submit('Preview', ['class' => 'btn btn-primary form-control']) !!}

    </div>
    {!! Form::close() !!}

    @include('errors.list')
@endsection

