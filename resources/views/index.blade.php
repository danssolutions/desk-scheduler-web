<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">




    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <title>Atari800</title>

    <style>
        .scheduler {
            margin: 20px;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .title_alarm {
            padding: 10px;
            padding-left: 50px;
            font-size: 25px;
            color: #0E3386;
            text-align: left;
        }

        .table_alarm {
            background: rgb(135, 148, 232);
            color: rgb(0, 0, 0);
            width: 100%;
            border-collapse: collapse;
            margin: 20px;

        }


        .table_alarm th,
        .table_alarm td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table_alarm th {
            background-color: #f4f4f4;
            color: #333;
        }

        .table_alarm tr:hover {
            background-color: #4446b1;
        }


        .alarm_button {
            display: inline-block;
            padding: 10px;
            font-size: 17px;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            border: 1px solid #007bff;
            color: white;
            background-color: #0E3386;
            border-radius: 20px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 20px;
        }

        .alarm_button:hover {
            background-color: beige;
            color: blue;
            border-radius: 20px;

        }

        .al {
            display: flex;
            flex-direction: row;
            justify-content: space-between
        }
    </style>


</head>

<body>
    @notifyCss
    <div class="scheduler">
        <div class="al">
            <h3 class="title_alarm">Scheduler - place where you can schedule height of your tables.</h3>
            <a href="/create"><button class="alarm_button">Add New Alarm</button></a>
        </div>
        <table class="table_alarm">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>Name of Alarm</th>
                    <th>Tables</th>
                    <th>Height</th>
                    <th>Time_from</th>
                    <th>Time_to</th>
                    <th>Week_start</th>
                    <th>Week_end</th>
                    <th>Alarm_sound</th>

                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->tables }}</td>
                        <td>{{ $post->height }}</td>
                        <td>{{ $post->time_from }}</td>
                        <td>{{ $post->time_to }}</td>
                        <td>{{ $post->week_start }}</td>
                        <td>{{ $post->week_end }}</td>
                        <td>{{ $post->alarm_sound }}</td>
                        <td>
                            <form action="/edit/{{ $post->id }}" method="get">
                                <button class="alarm_button" type="submit">Update</button>
                            </form>
                        </td>
                        <td>
                            <form action="/delete/{{ $post->id }}" method="post">
                                <button class="alarm_button" onclick="return confirm('Are you sure?');"
                                    type="submit">Delete</button>
                                @csrf
                                @method('delete')
                            </form>
                        </td>

                    </tr>
                @endforeach




            </tbody>
        </table>
        <div class="pagination">
            {{ $posts->links() }}
        </div>

    </div>
    @include('notify::components.notify')
    @notifyJs
</body>

</html>
