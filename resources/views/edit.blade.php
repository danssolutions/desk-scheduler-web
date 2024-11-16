<!doctype html>
<html lang="en">

<head>
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

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .title_alarm {
            padding: 10px;
            padding-left: 50px;
            font-size: 25px;
            color: #0E3386;
            text-align: left;
        }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atarii800</title>
</head>

<body>

    <div class="scheduler">
        <h3 class="title_alarm">Update Post</h3>
        <div class="form_alarm">
            <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input value="{{ $posts->name }}" type="text" name="name" class="form-control"
                    placeholder="Name">

                <select name="tables" class="form-control">
                    <option value="">Please choose your table</option>
                    <option value="Table_0" {{ $posts->tables == 'Table_0' ? 'selected' : '' }}>Table-O: Jane Doe
                    </option>
                    <option value="Table_1" {{ $posts->tables == 'Table_1' ? 'selected' : '' }}>Table_1: Daniel vacas
                        Crespo</option>
                    <option value="Table_2" {{ $posts->tables == 'Table_2' ? 'selected' : '' }}>Table_2: Mickey Mouse
                    </option>
                    <option value="Table_3" {{ $posts->tables == 'Table_3' ? 'selected' : '' }}>Table_3: Spiderman
                    </option>
                    <option value="Table_4" {{ $posts->tables == 'Table_4' ? 'selected' : '' }}>Table_4: Jan Kowal
                    </option>
                    <option value="Table_5" {{ $posts->tables == 'Table_5' ? 'selected' : '' }}>Table_5: Sabrina
                        Carpenter</option>
                    <option value="Table_6" {{ $posts->tables == 'Table_6' ? 'selected' : '' }}>Table_6: XYZ</option>
                    <option value="Table_7" {{ $posts->tables == 'Table_7' ? 'selected' : '' }}>Table_7: Boss</option>
                </select>
                <input value="{{ $posts->height }}" type="number" name="height" class="form-control"
                    placeholder="Height" min="660" max="1320" required>

                <input value="{{ $posts->time_from }}" type="time" name="time_from" class="form-control"
                    placeholder="Time_from">
                <input value="{{ $posts->time_to }}" type="time" name="time_to" class="form-control"
                    placeholder="Time_to">
                <input value="{{ $posts->week_start }}" type="week" name="week_start" class="form-control"
                    placeholder="Week_start">
                <input value="{{ $posts->week_end }}" type="week" name="week_end" class="form-control"
                    placeholder="Week_end">

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

</body>

</html>
