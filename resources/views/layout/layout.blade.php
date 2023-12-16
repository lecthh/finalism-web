<!DOCTYPE html>
<html>
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Schoolie</title>
</head>
<body class="min-h-screen flex flex-row-reverse">
        @extends('component.sidebar')
        @section('sidebar')
        
        @show
        
        @yield('content')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</html>