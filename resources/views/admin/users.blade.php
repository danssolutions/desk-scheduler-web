<x-app-layout>

<body>
    <div class="scheduler">
        <div class="al">
            <h3 class="title_alarm">Admin Panel - Manage Desk Assignments and Permissions</h3>
            <!-- <a href="/admin/create"><button id="addalarmbtn" class="alarm_button">Add New User</button></a> -->
        </div>
        
        <table class="table_alarm">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Desk ID</th>
                    <th>Assign Desk</th>
                    <th>Remove User</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->desk_id ?? 'None' }}</td>
                        <td>
                            <form action="{{ route('admin.update-desk-id', ['id' => $user->id]) }}" method="post">
                                @csrf
                                <select name="desk_id" class="form-control-multiple">
                                    <option value="" selected disabled>Select Desk</option>
                                    @foreach ($desks as $desk)
                                        <option value="{{ $desk }}" {{ $user->desk_id == $desk ? 'selected' : '' }}>
                                            {{ 'Desk ' . $desk }}
                                        </option>
                                    @endforeach
                                </select>
                                <button class="alarm_button" type="submit">Assign</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.delete-user', ['id' => $user->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="alarm_button" onclick="return confirm('Are you sure?');" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</x-app-layout>