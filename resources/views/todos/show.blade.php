<div>
    <h2>{{$todo->title}}<a href="/todos/{{$todo->id}}/edit"> <span class="pull-right glyphicon glyphicon-pencil" aria-hidden="true"></span> edit</a></h2>
    <p ng-if="!model.notFound">{{$todo->body}}</p>
</div>