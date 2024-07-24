<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>First Page</title>
    </head>
    <body class="antialiased">
        <h1>Hello home page of an empty laravel project!!</h1>
        <br><br>
        <h3>Value from database: {{App\Models\Name::first()->name}}</h3>
    </body>
</html>
