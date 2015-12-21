<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' lang='en' ng-app="todoApp">
<!--<![endif]-->
<head>
    <meta charset='utf-8' />
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
    <title></title>
    <meta content='' name='description' />
    <meta content='' name='author' />
    <meta content='width=device-width, initial-scale=1.0' name='viewport' />
    <?php echo Html::style("css/styles.css");?>
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <h1>TODO APP</h1>
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="/">TODO List</a></li>
            <li role="presentation"><a href="/todos/create">Creat New</a></li>
        </ul>
        @yield('content')
    </div>
</div>
</div>
<script src="js/lib/angular.min.js"></script>
<script src="js/lib/angular-ui-router.min.js"></script>
<script src="js/module.js"></script>
<script src="js/services/Todo.js"></script>
<script src="js/controllers/todosController.js"></script>
<script src="js/controllers/todoController.js"></script>
</body>
</html>
