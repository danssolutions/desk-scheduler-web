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

                <select id="tables" name="tables[]" class="form-control-multiple" required multiple>
                    <option value="">Please choose your table</option>
                    <option value="Table_0">Table-O: Jane Doe</option>
                    <option value="Table_1">Table_1: Daniel Vacas Crespo</option>
                    <option value="Table_2">Table_2: Mickey Mouse</option>
                    <option value="Table_3">Table_3: Spiderman</option>
                    <option value="Table_4">Table_4: Jan Kowal</option>
                    <option value="Table_5">Table_5: Sabrina Carpenter</option>
                    <option value="Table_6">Table_6: XYZ</option>
                    <option value="Table_7">Table_7: Boss</option>
                </select>
                <input type="number" id="height" name="height" class="form-control" placeholder="Height"
                    min="660" max="1320" required>


                <input type="time" id="time_from" name="time_from" class="form-control" placeholder="Time_from"
                    required>
                <select id="days" name="days[]" multiple>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>

                <select id="alarm_sound" name="alarm_sound" class="form-control-multiple" required>
                    <option value="">Please choose alarm sound</option>
                    <option value="Bip">Bip</option>
                    <option value="Beeze">Beeze</option>
                    <option value="Brr">Brr</option>
                </select>

                <button type="submit" class="alarm_button" onclick="scheduleReminder();">Submit</button>
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

</body>

</html>
