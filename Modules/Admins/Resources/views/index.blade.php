@extends('admins::layouts.app')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('admins.name') !!}
    </p>
@endsection
