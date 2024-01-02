<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Study With Us</title>

@include('style.css')
</head>

<body>
<div id="app">
<div class="main-wrapper">
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        @yield('section-header')
        </div>

        <div class="section-body">
            @yield('section-body')
        </div>
    </section>
    </div>
    <footer class="main-footer">
    <div class="footer-left">
        <div class="bullet"></div> Design By <a href="https://github.com/Sans1506" target="_blank">Ikhsan Firmansyah</a>
    </div>
    </footer>
</div>
</div>

@include('style.javascript')
</body>
</html>
