<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
       
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-50 text-black/50">
            
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        
                     
                    </header>

                    <main class="mt-6">
                        
<h1>Cirylic text</h1>
<form action="{{route('translit')}} " method="get">
        @csrf
        
        <textarea type="text" name="title" rows="10" cols="50"></textarea>
        <textarea  name="body"type="text" rows="10" cols="50">{{$result}}</textarea>
        <button>Retranslate</button>
        
</form>
<img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
                    </main>

                    <footer class="py-16 text-center text-sm text-black">
                        
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
