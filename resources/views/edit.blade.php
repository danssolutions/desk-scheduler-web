<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/support.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
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

    <div class="scheduler">
        <h3 class="title_alarm">Update Alarm</h3>
        <div class="form_alarm">
            <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input value="{{ $posts->name }}" type="text" name="name" class="form-control"
                    placeholder="Name" required>

                <label for="desk_id">Select Desk:</label>
                <select id="desk_id" name="desk_id" class="form-control" required>
                    <option value="" disabled>Select a desk</option>
                    @foreach($desks as $desk)
                        <option value="{{ $desk }}">{{ 'Desk ' . $desk }}</option>
                    @endforeach
                </select>

                <input value="{{ $posts->height }}" type="number" name="height" class="form-control"
                    placeholder="Height (mm)" min="660" max="1320" required>

                <input value="{{ $posts->time_from }}" type="time" name="time_from" class="form-control"
                    placeholder="Time From" required>

                <label for="days">Select Day:</label>
                <select id="days" name="days" class="form-control" multiple required>
                    <option value="Monday" {{ in_array('Monday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ in_array('Tuesday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ in_array('Wednesday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ in_array('Thursday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ in_array('Friday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Friday</option>
                    <option value="Saturday" {{ in_array('Saturday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Saturday</option>
                    <option value="Sunday" {{ in_array('Sunday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Sunday</option>
                </select>

                <label for="alarm_sound">Select Alarm Sound:</label>
                <select id="alarm_sound" name="alarm_sound" class="form-control" required>
                    <option value="" disabled>Please choose alarm sound</option>
                    <option value="0" {{ $posts->alarm_sound == '0' ? 'selected' : '' }}>None</option>
                    <option value="B" {{ $posts->alarm_sound == 'B' ? 'selected' : '' }}>Beep</option>
                    <option value="E" {{ $posts->alarm_sound == 'E' ? 'selected' : '' }}>Breeze</option>
                    <option value="M" {{ $posts->alarm_sound == 'M' ? 'selected' : '' }}>Brrr</option>
                    <option value="Z" {{ $posts->alarm_sound == 'Z' ? 'selected' : '' }}>Bzzz</option>
                    <option value="D" {{ $posts->alarm_sound == 'D' ? 'selected' : '' }}>DOOM</option>
                    <option value="R" {{ $posts->alarm_sound == 'R' ? 'selected' : '' }}>Rick Roll</option>
                    <option value="N" {{ $posts->alarm_sound == 'N' ? 'selected' : '' }}>Nokia</option>
                    <option value="K" {{ $posts->alarm_sound == 'K' ? 'selected' : '' }}>Krusty Krab</option>
                    <option value="P" {{ $posts->alarm_sound == 'P' ? 'selected' : '' }}>Pink Panther</option>
                </select>

                <button type="submit" class="alarm_button">Submit</button>
            </form>
        </div>
    </div>

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

</body>

</html>