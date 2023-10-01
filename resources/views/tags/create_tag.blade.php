<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create tag</title>
    <style>
        .title{
         width: 220px;
            height: 35px;
            font-size: 19px;
            text-align: center;
            margin: 2px auto;
        }
        .button2{
            display: block;
            width: 220px;
            
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <form action="/tags" method="POST">
        @csrf
        <h2 style="color: rgb(25, 137, 111); margin-left:50px;">create a tag</h2>
        <input class="title" type="text" placeholder="write tag name" name="tag" >
        <input class="button2" type="submit" name="save" value="save">

    </form>
    
</body>
</html>