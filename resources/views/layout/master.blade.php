<!DOCTYPE doctype html>
<html>
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
            <meta content="" name="description">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <title>
                        CRUD
                    </title>
                    @include('include.css')
					@stack('afterStyle')
                </meta>
            </meta>
        </meta>


       <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'baseUrl' => url('/'),
            'loading' => true
            ]) !!};
        </script>
    </head>
    <body>
        <div id="app">
            <div class="container">
                @yield('content')
            </div>
        </div>
            @include('include.js')
    </body>
</html>