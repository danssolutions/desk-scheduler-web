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


                <select name="days[]" class="form-control-multiple" multiple>
                    <option value="Monday" {{ in_array('Monday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>
                        Monday</option>
                    <option value="Tuesday"
                        {{ in_array('Tuesday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday"
                        {{ in_array('Wednesday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Wednesday
                    </option>
                    <option value="Thursday"
                        {{ in_array('Thursday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ in_array('Friday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>
                        Friday</option>
                    <option value="Saturday"
                        {{ in_array('Saturday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>Saturday</option>
                    <option value="Sunday" {{ in_array('Sunday', json_decode($posts->days) ?: []) ? 'selected' : '' }}>
                        Sunday</option>
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
