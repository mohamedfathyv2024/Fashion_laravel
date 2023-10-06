<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
           <li> {{$blogs->id}} </li>
        <li>{{$blogs->title}}</li>
        <li>{{$blogs->body}}</li>
        <li> <img src="{{asset($blogs->image)}}" width="60" height="60">
        </li>
        <ul>
            @foreach($blogs->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>


    </ul>
        

    </table>
</body>
</html>