<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	</title>
</head>
<body>





<h1>Lotin-Kiril</h1>
		<form action="{{route('to_cyrillic')}}" method="get">
			@csrf
			<textarea type="text" name="title" rows="10" cols="50" ></textarea>

			<button>Retranslate</button>
			
		</form>
<h1>Kiril-Lotin</h1>
		<form action="{{route('to_latin')}}" method="get">
			@csrf
			<textarea type="text" name="title" rows="10" cols="50" ></textarea>

			<button>Retranslate</button>
			
		</form>
<h1>REZULT NATIJA РЕЗУЛЬТАТ</h1>
<textarea name="body" type="text" rows="12" cols="50" >{{$text}}</textarea>

</body>
</html>