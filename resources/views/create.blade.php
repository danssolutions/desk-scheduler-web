<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/support.css') }}">

    <title>Atarii800</title>

</head>

<body>

    <div class="scheduler">
        <h3 class="title-alarm"><b>Add New Alarm</b></h3>
        <div class="form_alarm">
            <form action="/post" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" class="form-control" placeholder="Name" required>

                <select name="tables" class="form-control" required>
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
                <input type="number" name="height" class="form-control" placeholder="Height" min="660"
                    max="1320" required>


                <input type="time" name="time_from" class="form-control" placeholder="Time_from" required>
                <input type="time" name="time_to" class="form-control" placeholder="Time_to" required>
                <input type="week" name="week_start" class="form-control" placeholder="Week_start" required>
                <input type="week" name="week_end" class="form-control" placeholder="Week_end" required>

                <select name="alarm_sound" class="form-control" required>
                    <option value="">Please choose alarm sound</option>
                    <option value="Bip">Bip</option>
                    <option value="Beeze">Beeze</option>
                    <option value="Brr">Brr</option>
                </select>

                <button type="submit" class="alarm_button">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>
