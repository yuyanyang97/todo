<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .table{
                margin: 0 auto;
            }
            table, th, td{
                border: 1px solid;
                text-align: center;
            }
            tr{
                width: 30%;
            }
            .status-1 {
                background-color: #90EE90;
            }

            .status-0 {
                background-color: red;
            }
        </style>
    </head>
    <body>
        <table class="table">
            <thead>
                <tr>
                    <th>Mark as Done</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $record)
                    <div hidden>
                        @if($record->status)
                                {{$status = 'success'}}
                            @else
                                {{$status = 'warning'}}
                        @endif
                    </div>
                
                    <tr class="table-{{ $status }}">
                        <td>
                            <div class='text-center'>
                                <a href="{{route('update_status', ['id'=>$record->id])}}" class='btn btn-info' style='margin-right: 3px;'>
                                @if($record->status == 1)
                                    Revert
                                @else
                                    Done
                                @endif
                                </a>
                            </div>
                        </td>
                        <td>{{ $record->name }}</td>
                        <td>
                            @if($record->status)
                                {{$status = 'Done'}}
                            @else
                                {{$status = 'Pending'}}
                            @endif
                        </td>
                        <td>{{ $record->created_at }}</td>
                        <td>
                            <div class='text-center'>
                                <a href="{{route('check_task', ['id'=>$record->id])}}" class='btn btn-info' style='margin-right: 3px;'>Check</a>
                                <a href="{{route('delete_task', ['id'=>$record->id])}}" class='btn btn-info' style='margin-right: 3px;'>Delete</a>
                            </div>
                        </td>
                        <!-- Add more table cells to display additional fields -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
