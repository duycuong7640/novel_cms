@extends('pages::layouts.master')

@section('content')
    <div class="section-list bg-opacity radius">
        <h1 class="title">Ranking</h1>
        <div class="wrap-button-rankings">
            <button type="button" class="active radius-tiny">Daily</button>
            <button type="button" class="radius-tiny">Weekly</button>
            <button type="button" class="radius-tiny">Monthly</button>
        </div>
        <div class="wrap-list-content">
            @for($i=0; $i<=10; $i ++)
                <div class="item">
                    <div class="img">
                        <a href="" title="">
                            <i class="cover"
                               style="background-image: url('http://novelcms:8888/storage/photos/images/s1.png')"></i>
                        </a>
                    </div>
                    <div class="info-novel">
                        <h3>
                            <a href="" title="">Black Knight From Blue Star Black Knight From Blue Star Black
                                Knight From Blue Star</a>
                        </h3>
                        <div class="rank-novel">
                            <p class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                4.5
                            </p>
                            <p class="view">
                                <i class="fas fa-eye"></i> 840K views
                            </p>
                            <p class="view">
                                <i class="fas fa-calendar-alt"></i> Feb 19, 2024 at 12:53
                            </p>
                        </div>
                        <div class="button-status">
                            <button type="button" class="sample ongoing radius-tiny">Ongoing</button>
                            <button type="button" class="sample radius-tiny">Action</button>
                            <button type="button" class="sample radius-tiny">112 ch</button>
                            <button type="button" class="add-library radius"><i class="fas fa-bookmark"></i> Add to Library</button>
                        </div>
                        <div class="shortdes">
                            Novel Summary
                            The war in the kingdom intensified, and the orcs from the North were ready to take action. They traveled through time and became the ninth son of an earl. He was not qualified to inherit the title, but accidentally obtained the daily intelligence system. With the help of the daily intelligence system, he began to build a territory and obtain the title.
                            [Daily information has been updated]
                            [1: Renn was wandering around the Lucerne town market today and accidentally bought a life fruit from Mijie’s pulp shop. After taking it, he officially condensed the life seeds]
                            [2: In the northern part of your territory, there is an extremely rich iron mine among the Golimbo tribe]
                            [3: In ten days, your territory will be attacked by tauren]
                            [4. After seven days, there will be a group of unicorns looking for food in the west of your territory]
                            【5：…………】
                            [6: Engel Dressrosa seems to have some troubles, coming from the limitations of his own strength]
                            【7:……】
                            - Description from MTLNovel
                            Details
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
