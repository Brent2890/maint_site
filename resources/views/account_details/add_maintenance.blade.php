@extends('master')

@section('content')

    <h1 class="heading-style">Add New Maintenance Type</h1>

    {!! Form::open(['action' => 'MaintenanceTypeController@store']) !!}
    <div class="form-group">

        {!! Form::label('maintenance_type', 'Maintenance Type:') !!}
        {!! Form::text('maintenance_type', null, ['class' => 'form-control']) !!}

        <br>
        {!! Form::submit('Add Maintenance Type', ['class' => 'btn btn-primary form-control']) !!}

    </div>
    {!! Form::close() !!}

    @include('errors.list')

@endsection

