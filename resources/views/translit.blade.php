<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    </title>
</head>
<body>




<div  >
            <div style="display: flex;  align-items: center;  justify-content: center;  ">
            <h1>Lotin yoki  Kiril yozuga ugirish matn kiriting</h1>
            </div> 
        <div style="display: flex;  align-items: center;  justify-content: center;  "> 
            
            <form action="{{route('translit')}}" method="get">
                        @csrf
                        <textarea type="text" name="title" rows="12" cols="50" ></textarea>
                        <button>Retranslate</button>
            </form>

            
            <textarea name="body" type="text" rows="12" cols="50" >  </textarea>
        </div>
</div>


</body>
</html>