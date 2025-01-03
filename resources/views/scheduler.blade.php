<x-app-layout>
    <body>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: '/check-desk-notifications', // URL
                    method: 'GET',
                    success: function(response) {
                        console.log(response.message); // Displaying success message in console
                        console.log(response.posts); // Displaying success posts? in console
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        </script>

        {{-- @notifyCss --}}
        @if(auth()->user()->desk_id)
            <div class="scheduler">
                <div class="al">
                    <h3 class="title_alarm">Scheduler - place where you can schedule height of your tables.</h3>
                    <a href="/create"><button id="addalarmbtn" class="alarm_button">Add New Alarm</button></a>
                </div>
                <table class="table_alarm">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Name of Alarm</th>
                            <th>Tables</th>
                            <th>Height</th>
                            <th>Time_from</th>
                            <th>Days</th>
                            <th>Alarm_sound</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->desk_id }}</td>
                                <td>{{ $post->height }}</td>
                                <td>{{ $post->time_from }}</td>
                                <td>{{ $post->days }}</td>
                                <td>{{ $post->alarm_sound }}</td>
                                <td>
                                    <form action="/edit/{{ $post->id }}" method="get">
                                        <button class="alarm_button" type="submit">Update</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/delete/{{ $post->id }}" method="post">
                                        <button class="alarm_button" onclick="return confirm('Are you sure?');"
                                            type="submit">Delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $posts->links() }}
                </div>
            </div>
        @else
        <style>
            .no-desk-id-message {
                text-align: center;
                margin: 50px auto;
                padding: 20px;
                background-color: #ffdddd;
                border: 1px solid #ff8888;
                border-radius: 8px;
                width: 50%;
            }

            .no-desk-id-message .error-message {
                color: #cc0000;
                font-weight: bold;
            }
        </style>
            <div class="no-desk-id-message">
                <h3 class="title_alarm">Scheduler Unavailable</h3>
                <p class="error-message">
                    You do not have a desk assigned. Please contact an admin to assign a desk to your account.
                </p>
            </div>
        @endif

        @include('notify::components.notify')
        @notifyJs

        <script src="{{ asset('js/support.js') }}"></script>
    </body>
</x-app-layout>
