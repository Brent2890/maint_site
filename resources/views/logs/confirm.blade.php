@extends('master')

@section('content')

    <h1 class="heading-style">Confirm</h1>

    {!! Form::open(['action' => 'MaintenanceLogController@store']) !!}

        <div class="form-group">
            {!! Form::textarea('template', $template, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit Maintenance', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}

@endsection