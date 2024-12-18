<x-app-layout>
<body>
    <div class="scheduler">
        <h3 class="title_alarm"><b>Update Alarm</b></h3>
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
    <script src="{{ asset('js/support.js') }}"></script>
    </body>
</x-app-layout>
