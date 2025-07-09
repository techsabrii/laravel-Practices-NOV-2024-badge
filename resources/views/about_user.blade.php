<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
    @if($user)
        <h2>User Details (ID: {{ $id }})</h2>
        <table border="1" cellpadding="5">
            <tr>
                <th>Name</th>
                <th>Father Name</th>
            </tr>
            <tr>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['fathername'] }}</td>
            </tr>
        </table>
    @else
        <h2>No user found for ID: {{ $id }}</h2>
    @endif
    <p><a href="{{ route('about') }}">Back to all users</a></p>
</body>
</html>
