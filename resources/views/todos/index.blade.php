@extends('default')
@section('content')
    @if($todos)
        @if(Session::has('deleteMessage'))<div class="alert-success">{!! Session::get('deleteMessage') !!}</div>@endif
        @if(Session::has('createMessage'))<div class="alert-success">{!! Session::get('createMessage') !!}</div>@endif
        @if(Session::has('updatedMessage'))<div class="alert-success">{!! Session::get('updatedMessage') !!}</div>@endif
        @if(Session::has('notFoundMessage'))<div class="alert-danger">{!! Session::get('notFoundMessage') !!}</div>@endif
        <div>
            <h2>List</h2>
            <ul class="list-group">
                @foreach($todos as $todo)
                <li class="list-group-item">
                    <a href="/todos/{!! $todo->id !!}">{!! $todo->title!!}</a>
                    <p>{!! Form::model($todo, ['method' => 'DELETE', 'url' => '/todos/'. $todo->id]) !!}
                    {!! Form::button('delete',['type' => 'submit','class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}</p>
                </li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="alert-danger">failed to load todos</div>
    @endif
@stop