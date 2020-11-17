<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') {{ config('app.name') }}</title>
    @include('includes.styles')
    @stack('styles')
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');

    </script>
    <!-- /END GA -->
    @livewireStyles
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            {{-- include header --}}
            @include('includes.header')
            {{-- include sidebar --}}
            @include('includes.sidebar')

            <!-- Main Content -->

            @yield('content')
            @include('includes.footer')
        </div>
    </div>

    @stack('before-scripts')

    @include('includes.scripts')

    @stack('after-scripts')
    @livewireScripts
</body>

</html>
