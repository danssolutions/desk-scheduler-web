<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/support.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>SCHEDULER</title>



</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="https://img.icons8.com/quill/100/228BE6/galaxy.png" alt="Home" />
            <h1><a href="/main">Atari800</a></h1>
        </div>
        <div class="profile-menu">
            <img src="{{ asset('images/profile.png') }}" alt="Profile" onclick="toggleDropdown()">
            <div class="dropdown-menu" id="dropdownMenu">
                <a href="/profilepage">Profile</a>
                <a href="/settings">Settings</a>
            </div>
        </div>
    </div>
    @notifyCss
    <div class="scheduler">
        <div class="al">
            <h3 class="title_alarm">Scheduler - place where you can schedule height of your tables.</h3>
            <a href="/create"><button id="addalarmbtn" class="alarm_button">Add New Alarm</button></a>
        </div>
        <table class="table_alarm">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>Name of Alarm</th>
                    <th>Tables</th>
                    <th>Height</th>
                    <th>Time_from</th>
                    <th>Days</th>

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
                        <td>{{ $post->days }}</td>
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
    <div class="bottom">
        <div class="bottom-section">
            <h4>Company</h4>
            <ul>
                <li><a href="/about">About us</a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Affiliate program</a></li>
            </ul>
        </div>
        <div class="bottom-section">
            <h4>Help</h4>
            <ul>
                <li><a href="#">Q&A</a></li>
                <li><a href="#">Sign up</a></li>
            </ul>
        </div>
        <div class="bottom-section">
            <h4>Contact us</h4>
            <ul>
                <li>Alsion 2, 6400 Sønderborg</li>
                <li>Telephone: 6550 1160</li>
            </ul>
        </div>
    </div>

    <div class="end">
        <footer>
            <marquee>
                <p>©2024 Made by Group 7 | All Rights Reserved</p>
            </marquee>
        </footer>
    </div>
<script src="{{ asset('js/support.js') }}"></script>
</body>

</html>
