<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Отзывы &ndash; Первый Бит</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('styles')
    </head>
    <body>
        @auth
        <div class="text-right pt-3 pr-3">
            {{ Auth::user()->name }}
            <a class="btn btn-sm btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endauth

        <div class="container pt-4 mb-3">
            @yield('content')
        </div>

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
