<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    @include('components.dashboard.styles')
    @yield('styles')
</head>
<body>
<div id="layout-wrapper">
    @include('components.dashboard.header')
    @include('components.dashboard.sidebar')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('components.dashboard.footer')
    </div>
</div>
@livewireScripts
@include('components.dashboard.scripts')
@yield('scripts')
</body>
</html>