<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo List Detail</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 1% 15%;
            }

            .button{
                margin-top: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
    {{ Form::open(array('enctype'=>'multipart/form-data', 'url' => route('store_task'))) }}

    <div class="form-group">
        {{ Form::label('name', 'Task Name') }}<br>
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group button">
        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }} 
    </div>

    {{ Form::close() }}
    </body>
</html>
