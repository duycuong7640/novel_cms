<!DOCTYPE html>
<head>
    @include('pages::elements.extend.meta')
    @include('pages::elements.extend.style')
</head>
<body>
@include('pages::elements.header')
@include('pages::elements.breadcrumb')
<section id="main-content" class="main-width2">
    <div class="wrap-content-extend">
        @yield('content')
    </div>
</section>
@include('pages::elements.footer')
@include('pages::elements.extend.script')
</body>
</html>
