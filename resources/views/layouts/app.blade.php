<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Rating - @yield('titre')</title>
    {{-- styles --}}
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
</head>

<body>
    {{-- begin navbar --}}
    @include('layouts.navbar')
    {{-- end navbar --}}

    {{-- begin main --}}
    <main class="container mt-3">
        @yield('main')
    </main>
    {{-- end main --}}



    {{-- begin footer --}}
    <footer>
        <div class="d-flex justify-content-center border-none border-top py-4">
            <small> Product Rating &copy; {{ date('Y') }}</small>
        </div>
    </footer>
    {{-- end footer --}}


    {{-- javascript --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>
