@extends('pages::layouts.master')

@section('content')
    <div class="section-list bg-opacity radius">
        <h1 class="title">New</h1>
        <div class="wrap-list-category">
            @for($i=0; $i<=30; $i ++)
                <div class="item-category">
                    <button type="button" class="radius-tiny">
                        <a href="" title="">
                            Romantic
                        </a>
                    </button>
                </div>
            @endfor
        </div>
    </div>
@endsection
