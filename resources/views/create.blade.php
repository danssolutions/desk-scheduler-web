<x-app-layout>
    <body>
    <div class="scheduler">
        <h3 class="title_alarm"><b>Add New Alarm</b></h3>
        <div class="form_alarm">
            <form action="/post" method="post" enctype="multipart/form-data">
                @csrf
                <input id="name" type="text" name="name" class="form-control" placeholder="Name" required>

                @if(auth()->user()->usertype === 'admin')
                    <label for="desk_id">Select Desk:</label>
                    <select id="desk_id" name="desk_id" class="form-control">
                        <option value="" disabled selected>Select a desk</option>
                        @foreach($desks as $desk)
                            <option value="{{ $desk }}">{{ 'Desk ' . $desk }}</option>
                        @endforeach
                    </select>
                @else
                    <input type="hidden" name="desk_id" value="{{ auth()->user()->desk_id }}">
                @endif

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
    <script src="{{ asset('js/support.js') }}"></script>
    </body>
</x-app-layout>
