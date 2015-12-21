@extends('default')
@section('content')
<h2>Creat New Item</h2>
{!! Form::open(['method' => 'POST', 'url' => '/todos/create']) !!}
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) !!}
        @if($errors->has('title'))<span class="alert-danger">{!! $errors->first('title') !!}</span>@endif
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Body</label>
        {!! Form::textarea('body', '', ['class' => 'form-control', 'rows' => '3']) !!}
        @if($errors->has('body'))<span class="alert-danger">{!! $errors->first('body') !!}</span>@endif
    </div>
    <button type="submit" class="btn btn-primary">Creat</button>
{!! Form::close() !!}
@stop