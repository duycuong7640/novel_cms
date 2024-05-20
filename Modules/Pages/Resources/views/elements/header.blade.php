<header id="header" class="bg-opacity">
    <div class="main-width">
        <div class="wh1">
            <div class="logo">
                <a href="{{ route("client.home") }}" title="Logo">
                    <img
                        src="{!! !empty($data['commonSetting']["logo"]->thumbnail) ? $data['commonSetting']["logo"]->thumbnail : '' !!}"
                        title="Logo" alt="Logo"/>
                </a>
            </div>
        </div>
        <div class="wh2">
            <form method="get" action="">
                <input type="text" name="keyword" placeholder="Keyword..." />
                <button type="button"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="wh3">
            @include('pages::elements.menu')
        </div>
    </div>
</header>
