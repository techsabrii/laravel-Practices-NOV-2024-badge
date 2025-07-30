<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @includeUnless(0,'includes.header', ['name' => 'Blade Example'])
    <h1>Hello, World!</h1>
    <p>This is a simple Blade template.</p>
</body>

</html>