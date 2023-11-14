<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Devstagram - @yield("Titulo")</title>
        @vite("resources/css/app.css")
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <a href="/">
                    <h1 class="text-3xl font-black">Devstagram</h1>
                </a>
                <nav class="flex gap-2">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route("login") }}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route("register.index") }}">Sign in</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield("Titulo")</h2>
            @yield("content")
        </main>

        <footer class="text-center p-5 text-gray-500 font-bold uppercase">
            Devstagram all rights reserved &copy; {{now()->year}}
        </footer>
    </body>
</html>