<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atarii800</title>

    <style>
        .scheduler {
            margin: 20px;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }


        .form_alarm {
            background: rgb(135, 148, 232);
            color: rgb(249, 249, 251);
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
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
            margin: 10px 0;
        }

        .alarm_button:hover {
            background-color: beige;
            color: blue;
        }

        .title_alarm {
            padding: 10px;
            padding-left: 50px;
            font-size: 25px;
            color: #0E3386;
            text-align: left;
        }
    </style>

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
