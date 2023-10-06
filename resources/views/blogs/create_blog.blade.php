<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

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
  height: 60px;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
  margin-top: 10px;
  margin-bottom: 17px;
  color: #333;
}
#select {
    display: block;

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
    <div style="width: 50%">
        <form action="/blogs" method="POST" enctype="multipart/form-data">
            @csrf
        {{-- title --}}
        <div class="make-center"><span>Write Blog Title :</span><input type="text" name="title"
                placeholder="BLOG TITLE" class="title_class">
        </div>
        {{-- text area --}}
            <textarea class="ckeditor" id="editor" name="body"></textarea>
        {{-- select & image  --}}
        <div class="select-img">
    
            TAGS: 
        {{-- <select id="tags" names="tags[]"  multiple='multiple' > --}}
            <select id="tags" name="tags[]"  multiple='multiple' class="tags"   >
    
        @foreach ($tags as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    
        </select>
    
        <input class="image" type="file" name="image" id="imageInput">
        </div> {{-- end div of select & image --}}
        <div>
            <img src="" alt="" id="preview"  width="120" height="120">
        </div>
        {{-- button submit --}}
        <button class="button1" type="submit" name="save" >SAVE</button>
        </form>
    </div>

    {{-- ====================================JS======================================== --}}
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

 
    <script>
        // JavaScript to handle image preview
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
            }
        });
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tags').select2({
            placeholder: "Choose tags",
            tags: true, // Allow user to add new tags
            tokenSeparators: [','], // Define separator for tags
            width: '60%' // Adjust the width as needed
        });
    });
</script>






</body>
</html>