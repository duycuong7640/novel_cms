@extends('pages::layouts.extend')

@section('content')
    <div class="wrap-detail-post">
        <h1 class="title">Cate Games</h1>
        <div class="show">
            <div class="time-updated">15-04-2022, 11:46</div>
            <div class="content">
                Is it true that you are worn out on looking for good games on Google Play Store? There are great many games
                accessible today, however it's excessively tedious to find one single game to play. On the off chance that
                this is you, we're happy you're on TAKEMOD! Here, <a href="">we have a colossal</a> choice of MOD APK games for Android
                that you can download Free of charge! These aren't your common games as we have a monstrous choice for you,
                action, romance, simulation, puzzles, and that's just the beginning. Get the best MOD APK games today online
                on our mind boggling site and begin playing!
            </div>
        </div>

        <div class="title-related">Other News</div>
        <div class="post-items">
            <ul>
                @for($i = 0; $i < 3; $i ++)
                    <li>
                        <div class="item">
                            <div class="img">
                                <a href="" title="">
                                    <i class="cover"
                                       style="background-image: url('http://xgame:8888/img/w360/h205/fill!/posts/new.jpeg')"></i>
                                </a>
                            </div>
                            <div class="info">
                                <div class="time-updated">15-04-2022, 11:46</div>
                                <h2>
                                    <a href="" title="">
                                        Mobile Gaming Studios Ltd.
                                    </a>
                                </h2>
                            </div>
                        </div>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
@endsection
