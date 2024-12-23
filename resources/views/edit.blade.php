<x-app-layout>
<body>
    <div class="scheduler">
        <h3 class="title_alarm"><b>Update Alarm</b></h3>
        <div class="form_alarm">
            <form action="/update/{{ $post->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input value="{{ $post->name }}" type="text" name="name" class="form-control"
                    placeholder="Name" required>

                @if(auth()->user()->isAdmin()) {{-- Only show this for admins --}}
                    <label for="desk_id">Select Desk:</label>
                    <select id="desk_id" name="desk_id" class="form-control" required>
                        <option value="" disabled>Select a desk</option>
                        @foreach($desks as $desk)
                            <option value="{{ $desk }}" {{ $post->desk_id == $desk ? 'selected' : '' }}>
                                {{ 'Desk ' . $desk }}
                            </option>
                        @endforeach
                    </select>
                @else
                    {{-- Show desk ID as text for non-admins --}}
                    <input type="hidden" name="desk_id" value="{{ $post->desk_id }}">
                    <p><b>Desk:</b> Desk {{ $post->desk_id }}</p>
                @endif

                <input value="{{ $post->height }}" type="number" name="height" class="form-control"
                    placeholder="Height (mm)" min="660" max="1320" required>

                <input value="{{ $post->time_from }}" type="time" name="time_from" class="form-control"
                    placeholder="Time From" required>
                
                <label for="days">Select Day:</label>
                <select id="days" name="days" class="form-control" required>
                    <option value="Monday" {{ $post->days == 'Monday' ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ $post->days == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ $post->days == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ $post->days == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ $post->days == 'Friday' ? 'selected' : '' }}>Friday</option>
                    <option value="Saturday" {{ $post->days == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                    <option value="Sunday" {{ $post->days == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                </select>

                <label for="alarm_sound">Select Alarm Sound:</label>
                <select id="alarm_sound" name="alarm_sound" class="form-control" required>
                    <option value="" disabled>Please choose alarm sound</option>
                    <option value="0" {{ $post->alarm_sound == '0' ? 'selected' : '' }}>None</option>
                    <option value="B" {{ $post->alarm_sound == 'B' ? 'selected' : '' }}>Beep</option>
                    <option value="E" {{ $post->alarm_sound == 'E' ? 'selected' : '' }}>Breeze</option>
                    <option value="M" {{ $post->alarm_sound == 'M' ? 'selected' : '' }}>Brrr</option>
                    <option value="Z" {{ $post->alarm_sound == 'Z' ? 'selected' : '' }}>Bzzz</option>
                    <option value="D" {{ $post->alarm_sound == 'D' ? 'selected' : '' }}>DOOM</option>
                    <option value="R" {{ $post->alarm_sound == 'R' ? 'selected' : '' }}>Rick Roll</option>
                    <option value="N" {{ $post->alarm_sound == 'N' ? 'selected' : '' }}>Nokia</option>
                    <option value="K" {{ $post->alarm_sound == 'K' ? 'selected' : '' }}>Krusty Krab</option>
                    <option value="P" {{ $post->alarm_sound == 'P' ? 'selected' : '' }}>Pink Panther</option>
                </select>

                <button type="submit" class="alarm_button">Submit</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/support.js') }}"></script>
    </body>
</x-app-layout>
