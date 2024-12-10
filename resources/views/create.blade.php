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
    <title>SCHEDULER</title>

</head>

<body>
    <div class="scheduler">
        <h3 class="title-alarm"><b>Add New Alarm</b></h3>
        <div class="form_alarm">
            <form action="/post" method="post" enctype="multipart/form-data">
                @csrf
                <input id="name" type="text" name="name" class="form-control" placeholder="Name" required>

                <label for="desk_id">Select Desk:</label>
                <select id="desk_id" name="desk_id" class="form-control" required>
                    <option value="" disabled selected>Select a desk</option>
                    @foreach($desks as $desk)
                        <option value="{{ $desk }}">{{ 'Desk ' . $desk }}</option>
                    @endforeach
                </select>

                <input type="number" id="height" name="height" class="form-control" placeholder="Height (mm)"
                    min="660" max="1320" required>

                <input type="time" id="time_from" name="time_from" class="form-control" placeholder="Time From" required>

                <label for="days">Select Day:</label>
                <select id="days" name="days" class="form-control" required>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>

                <label for="alarm_sound">Select Alarm Sound:</label>
                <select id="alarm_sound" name="alarm_sound" class="form-control" required>
                    <option value="" disabled selected>Please choose alarm sound</option>

                    <option value="0">None</option>
                    <option value="B">Beep</option>
                    <option value="E">Breeze</option>
                    <option value="M">Brrr</option>
                    <option value="Z">Bzzz</option>
                    <option value="D">DOOM</option>
                    <option value="R">Rick Roll</option>
                    <option value="N">Nokia</option>
                    <option value="K">Krusty Krab</option>
                    <option value="P">Pink Panther</option>
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

    <audio src="" id="notificationSound"></audio>
    <script src="{{ asset('js/support.js') }}"></script>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>

</html>