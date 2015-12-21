@extends('default')
@section('content')
    @if($todo)
    <h2>update Item</h2>
    {!! Form::model($todo, ['method' => 'PUT', 'url' => '/todos/'.$todo->id.'/update']) !!}
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
        @if($errors->has('title'))<span class="alert-danger">{!! $errors->first('title') !!}</span>@endif
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Body</label>
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '3']) !!}
        @if($errors->has('body'))<span class="alert-danger">{!! $errors->first('body') !!}</span>@endif
    </div>
    <button type="submit" class="btn btn-primary">update</button>
    {!! Form::close() !!}
    @else
        <div class="alert-danger">failed to load todo</div>
    @endif
@stop