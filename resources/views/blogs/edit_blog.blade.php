<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .ck-editor__editable {
    min-height: 200px; /* Example height */
    border: 1px solid #ccc; /* Example border */
    padding: 10px; /* Example padding */
    width: 650px;
}

        .title_class {
            width: 220px;
            height: 25px;
            font-size: 19px;
            text-align: center;
            margin: 2px auto;
        }
        span {
            font-size: 18px;
            color: black;
            font-weight: bold;
            margin-right: 5px;
            margin-left: 38px;

        }
        .button1 {
            display: block;
            width: 100%;
            margin: 3px auto;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .make-center{
            width: 300px;
            margin: 3px auto;
        }
        /* Style for the custom select */
#tags {
    display: block;
  width: 400px;
  height: 30px;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
  margin-top: 10px;
  margin-bottom: 17px;
  color: #333;
}
.tags input {
    width: 200px;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
  margin-top: 10px;
  color: #333;
}
/* Style for the options inside the select */
#select option {
  padding: 10px;
  background-color: #fff;
  color: #333;
}

    </style>
</head>
<body>
    
    <form action="/blogs" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    {{-- title --}}
    <div class="make-center"><span>Write Blog Title :</span><input type="text" name="title"
            placeholder="BLOG TITLE" class="title_class" value="{{$blogs->title}}">
    </div>
    {{-- text area --}}
        <textarea class="ckeditor" id="editor" name="body" >{{$blogs->body}}</textarea>
    {{-- select & image  --}}
    <div class="select-img">

        TAGS: 
    <select id="tags" names="tags[]"  multiple='multiple' >
        @foreach ($tags as $tagId => $tagName)
            <option value="{{ $tagId }}">{{ $tagName }}</option>
        @endforeach
    </select>

    <input class="image" type="file" name="image" >
    </div> {{-- end div of select & image --}}
    {{-- button submit --}}
    <button class="button1" type="submit" name="save" >SAVE</button>
    </form>

    {{-- ckeditor plugin --}}
    <script src="public\ckeditor\ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    {{-- Handle error of validation --}}
    @if($errors->any())
     @foreach ($errors->all() as $error)

     <p style="color: red">{{$error}}</p>
         
     @endforeach
     
    @endif
</body>
</html>