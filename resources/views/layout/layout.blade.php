<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>website hambali</title>    
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @else
        
        @endif
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="">
      
<x-navbar></x-navbar>
<x-header>
    
    {{$header}}
</x-header>

<main>{{$slot}}</main>

    </body>

            
    
</html>


    