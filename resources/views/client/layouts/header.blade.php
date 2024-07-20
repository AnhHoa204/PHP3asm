<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    @if (Route::has('login'))
    <div class="position-fixed top-0 end-0 p-3 text-end z-10">
        @auth       
            <a href="{{ url('/home') }}" class="text-white">Home</a>
        @else
            <a href="{{ route('login') }}" class="btn bg-primary btn-outline-light me-2">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-light">Register</a>
            @endif
        @endauth
    </div>
@endif
    <header class="bg-dark text-white py-3" >
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3"> <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button> --}}
                </h1>
                <nav>
                    <ul class="nav  " style="margin-right: 900px">
                        @foreach ($categories as $item)
                            <li class="nav-item">
                                <a class="nav-link text-white"
                                    href="{{ route('posts.by.category', $item->id) }}">{{ $item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- <footer class="bg-dark text-white text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0">&copy; 2024 News Website. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
</body>

</html>
