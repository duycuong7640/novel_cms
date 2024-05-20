@extends('pages::layouts.master')

@section('content')
    <div class="section-list bg-opacity radius">
        <h1 class="title">Recent Updates</h1>
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
                        <div class="wrap-delete">
                            <a href="javascript:confirmDelete('', '')" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
