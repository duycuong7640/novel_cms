<!DOCTYPE html>
<head>
    @include('pages::elements.extend.meta')
    @include('pages::elements.extend.style')
</head>
<body>
@include('pages::elements.header')
<section class="main-width-tiny">
    <div class="main-content">
        <div class="wrap-content">
            @yield('content')
        </div>
    </div>
</section>
@include('pages::elements.footer')
@include('pages::elements.extend.script')
</body>
</html>
