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
        <h3 class="title_alarm">Update Post</h3>
        <div class="form_alarm">
            <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input value="{{ $posts->name }}" type="text" name="name" class="form-control"
                    placeholder="Name">

                <select name="tables[]" class="form-control-multiple" multiple>
                    <option value="Table_0"
                        {{ in_array('Table_0', json_decode($posts->tables) ?: []) ? 'selected' : '' }}>
                        Table-O: Jane Doe
                    </option>
                    <option value="Table_1"
                        {{ in_array('Table_1', json_decode($posts->tables) ?: []) ? 'selected' : '' }}>
                        Table_1: Daniel Vacas Crespo
                    </option>
                    <option value="Table_2"
                        {{ in_array('Table_2', json_decode($posts->tables) ?: []) ? 'selected' : '' }}>
                        Table_2: Mickey Mouse
                    </option>
                    <option value="Table_3"
                        {{ in_array('Table_3', json_decode($posts->tables) ?: []) ? 'selected' : '' }}>
                        Table_3: Spiderman
                    </option>
                    <option value="Table_4"
                        {{ in_array('Table_4', json_decode($posts->tables) ?: []) ? 'selected' : '' }}>
                        Table_4: Jan Kowal
                    </option>
                    <option value="Table_5"
                        {{ in_array('Table_5', json_decode($posts->tables) ?: []) ? 'selected' : '' }}>
                        Table_5: Sabrina Carpenter
                    </option>
                    <option value="Table_6"
                        {{ in_array('Table_6', json_decode($posts->tables) ?: []) ? 'selected' : '' }}>
                        Table_6: XYZ
                    </option>
                    <option value="Table_7"
                        {{ in_array('Table_7', json_decode($posts->tables) ?: []) ? 'selected' : '' }}>
                        Table_7: Boss
                    </option>
                </select>


                <input value="{{ $posts->height }}" type="number" name="height" class="form-control"
                    placeholder="Height" min="660" max="1320" required>

                <input value="{{ $posts->time_from }}" type="time" name="time_from" class="form-control"
                    placeholder="Time_from">


                <select name="days" class="form-control-multiple">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>





                <select name="alarm_sound" class="form-control">
                    <option value="">Please choose alarm sound</option>
                    <option value="Bip" {{ $posts->alarm_sound == 'Bip' ? 'selected' : '' }}>Bip</option>
                    <option value="Beeze" {{ $posts->alarm_sound == 'Beeze' ? 'selected' : '' }}>Beeze</option>
                    <option value="Brr" {{ $posts->alarm_sound == 'Brr' ? 'selected' : '' }}>Brr</option>
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
