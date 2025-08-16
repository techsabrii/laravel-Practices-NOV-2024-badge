<form action="{{ route('delete-multiple-users') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete selected users?');">
    @csrf
    @method('DELETE')

    <table border="1" class="table table-bordered">
        <tr>
            <th>
                <input type="checkbox" id="select-all"> <!-- Select All Checkbox -->
            </th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Email</th>
            <th>Verified</th>
            <th>Role</th>
            <th colspan="2">Action</th>
        </tr>

        @foreach ($user as $users)
        <tr>
            <td>
                <input type="checkbox" name="ids[]" value="{{ $users->id }}">
            </td>
            <td>{{ $users->name }}</td>
            <td><a href="{{ route('details',['id'=>$users->id]) }}">view</a></td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->verified ?? '-' }}</td>
            <td>{{ $users->role ?? '-' }}</td>
            <td>
                <a href="{{ route('get-update', ['id' => $users->id]) }}">Update</a>
            </td>
            <td>
                <form action="{{ route('delete-user', $users->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <button type="submit" class="btn btn-danger mt-2">Delete Selected</button>
</form>

<script>
    // Select All functionality
    document.getElementById('select-all').onclick = function() {
        let checkboxes = document.querySelectorAll('input[name="ids[]"]');
        for (let checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
</script>
