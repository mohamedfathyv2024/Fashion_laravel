<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($data as $blog)
        <p>{{ $blog->id }}) {{ $blog->title }} <a href="{{ url("blogs/$blog->id") }}">Show</a></p>
    @endforeach
</body>
</html>