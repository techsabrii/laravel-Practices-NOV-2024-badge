<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>




    <table border="1">
    <tr>
        <td>Name</td>
        <td>Father Name</td>
        <td>email</td>
        <td>Varifiyd</td>
        <td>role</td>
        <td>DOB</td>
    </tr>
    @foreach ($user as $users)


    <tr>
        <td>{{$users->name}}</td>
        <td><a href="{{$users->id}}">view</a></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endforeach
    </table>
</body>

</html>
