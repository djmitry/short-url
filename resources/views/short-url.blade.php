@extends('layouts.app')
@section('content')
@include('common.errors')

@isset ($success)
    <div class="alert alert-success">
        {!! $success !!}
    </div>
@endif

{!! Form::open(['route' => 'shortUrl.store', 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('source_url', 'Исходный Url', ['class' => 'label-control']) !!}
                {!! Form::text('source_url', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('short_url', 'Короткий Url', ['class' => 'label-control']) !!}
                {!! Form::text('short_url', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('date_expire', 'Срок жизни', ['class' => 'label-control']) !!}
                {!! Form::date('date_expire', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    {!! Form::submit('Уменьшить', ['class' => 'btn btn-success']) !!}
{!! Form::close() !!}
@endsection