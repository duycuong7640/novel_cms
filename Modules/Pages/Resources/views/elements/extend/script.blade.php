<script type="text/javascript" src="{{ asset('/static/web/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/static/web/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/static/web/js/menu/ddsmoothmenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('/static/web/js/main.js') }}"></script>
@yield('scripts')
@yield('validate')
<script type="text/javascript">
    ddsmoothmenu.init({
        mainmenuid: "smoothmenu1",
        orientation: 'h',
        classname: 'ddsmoothmenu',
        contentsource: "markup"
    });
</script>
