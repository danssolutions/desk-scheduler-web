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

                <select name="days" class="form-control">
                    <option value="">Please choose your day</option>
                    <option value="Monday" {{ $posts->days == 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ $posts->days == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ $posts->days == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ $posts->days == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ $posts->days == 'Friday' ? 'selected' : '' }}>Friday</option>
                    <option value="Saturday" {{ $posts->days == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                    <option value="Sunday" {{ $posts->days == 'Sunday' ? 'selected' : '' }}>Sunday</option>
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

</body>

</html>
