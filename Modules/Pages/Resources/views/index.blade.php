@extends('pages::layouts.master')

@section('content')
    <div>
        <div class="section-news bg-opacity radius">
            <label class="title">New Novels</label>
            <div class="wrap-carousel">
                <div class="owl-carousel owl-theme">
                    @for($i=0; $i<=30; $i ++)
                        <div class="item">
                            <div class="img">
                                <a href="" title="">
                                    <i class="cover"
                                       style="background-image: url('http://novelcms:8888/storage/photos/images/s1.png')"></i>
                                </a>
                            </div>
                            <div class="info-novel">
                                <h2>
                                    <a href="" title="">Black Knight From Blue Star Black Knight From Blue Star Black
                                        Knight From Blue Star</a>
                                </h2>
                                <div class="cate-total-chap">
                                    <span class="category">
                                        <a href="" title="">Romantic</a>
                                    </span>
                                    <span class="chapters">
                                        <a href="" title="">195 ch</a></span>
                                </div>
                                <div class="time-updated">
                                    <i class="far fa-clock"></i>
                                    Added 4 hours ago
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="a-thumbnail">
            <a href="" title="">
                <img src="{{ asset('static/web/images/ads.png') }}" title="" alt=""/>
            </a>
        </div>
        <div class="section-updated bg-opacity radius">
            <label class="title">Recent Updates</label>
            <div class="wrap-updated-content">
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
                            <div class="chapter-lists">
                                <ul class="chapter">
                                    <li>
                                        <span>#401</span>
                                        <a href="" title="">My master can beat you to death, and so can I, Xu Yan.</a>
                                    </li>
                                    <li>13 phút trước</li>
                                </ul>
                                <ul class="chapter">
                                    <li>
                                        <span>#401</span>
                                        <a href="" title="">My master can beat you to death, and so can I, Xu Yan.</a>
                                    </li>
                                    <li>13 phút trước</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="load-more">
            <button type="button">Load more...</button>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('static/web/carousel/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/web/carousel/owlcarousel/assets/owl.theme.default.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('static/web/carousel/owlcarousel/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function () {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop: true,
                nav: true,
                margin: 18,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    960: {
                        items: 5
                    },
                    1200: {
                        items: 4.3
                    }
                }
            });
            owl.on('mousewheel', '.owl-stage', function (e) {
                if (e.deltaY > 0) {
                    owl.trigger('next.owl');
                } else {
                    owl.trigger('prev.owl');
                }
                e.preventDefault();
            });
        })
    </script>
@endsection
