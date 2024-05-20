@extends('admins::layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex flex-column flex-md-row align-items-center">
                    <h4 class="mb-md-0 mb-4 mr-4">{{ !empty($data['common']['title']) ? $data['common']['title'] : '' }}</h4>
                    <div class="wrapper d-flex align-items-center">
                        <form class="form-inline">
                            <input type="text" name="title"
                                   value="{{ request()->has('title') ? request()->get('title') : '' }}"
                                   class="form-control mb-0 mr-sm-2"
                                   placeholder="Title">
                            <div class="input-group mb-0 mr-sm-2">
                                <select name="parent_id" class="form-control form-select-search">
                                    {!! $data['category'] !!}
                                </select>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary mb-0">{{ adminForm::FORM_HEAD['SEARCH'] }}</button>
                        </form>
                    </div>
                    <div
                        class="wrapper ml-md-auto d-flex flex-column flex-md-row kanban-toolbar ml-n2 ml-md-0 mt-4 mt-md-0">
                        <div class="d-flex mt-4 mt-md-0">
                            <a href="{{ route('admin.point.create') }}">
                                <button type="button" class="btn btn-success">
                                    {{ adminForm::FORM_HEAD['CREATE'] }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::has('success'))
            <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        @if(Session::has('error'))
            <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="50">STT</th>
                                    <th width="100">Thumbnail</th>
                                    <th>Title</th>
                                    <th>Sort</th>
                                    <th>Category</th>
                                    <th width="100">Author</th>
                                    <th width="40">Status</th>
                                    {{--                                    <th width="55">Menu top</th>--}}
                                    {{--                                    <th width="55">Về chúng tôi</th>--}}
                                    {{--                                    <th width="55">Hỗ trợ</th>--}}
                                    {{--                                    <th width="55">Dịch vụ</th>--}}
                                    <th width="50">Created</th>
                                    <th width="50">Modified</th>
                                    <th width="50">ID</th>
                                    <th width="95"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['list'] as $k=>$row)
                                    <tr>
                                        <td>{{ \Helpers::renderSTT($k + 1, $data['list']) }}</td>
                                        <td>
                                            @if(!empty($row->thumbnail))
                                                <img src="{{ asset($row->thumbnail) }}" class="mw-100">
                                            @endif
                                        </td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->sort }}</td>
                                        <td>{{ !empty($row->category->title) ? $row->category->title : '' }}</td>
                                        <td>{{ !empty($row->user->email) ? $row->user->email : '' }}</td>
                                        <td>{{ \Helpers::renderStatus($row->status) }}</td>
                                        {{--                                        <td>--}}
                                        {{--                                            <a class="icon-form status active" href="{{ route('admin.point.status', ['id' => $row->id, 'field' => 'choose_1']) }}">--}}
                                        {{--                                                {!! (($row->choose_1 == 1) ? '<i class="icon-check"></i>' : '<i class="icon-close"></i>') !!}--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </td>--}}
                                        {{--                                        <td>--}}
                                        {{--                                            @if(!$row->parent_id)--}}
                                        {{--                                                <a class="icon-form status active"--}}
                                        {{--                                                   href="{{ route('admin.point.status', ['id' => $row->id, 'field' => 'choose_1']) }}">--}}
                                        {{--                                                    {!! (($row->choose_1 == 1) ? '<i class="icon-check"></i>' : '<i class="icon-close"></i>') !!}--}}
                                        {{--                                                </a>--}}
                                        {{--                                            @endif--}}
                                        {{--                                        </td>--}}
                                        {{--                                        <td>--}}
                                        {{--                                            <a class="icon-form status active"--}}
                                        {{--                                               href="{{ route('admin.point.status', ['id' => $row->id, 'field' => 'choose_3']) }}">--}}
                                        {{--                                                {!! (($row->choose_3 == 1) ? '<i class="icon-check"></i>' : '<i class="icon-close"></i>') !!}--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </td>--}}
                                        {{--                                        <td>--}}
                                        {{--                                            <a class="icon-form status active" href="{{ route('admin.point.status', ['id' => $row->id, 'field' => 'choose_4']) }}">--}}
                                        {{--                                                {!! (($row->choose_4 == 1) ? '<i class="icon-check"></i>' : '<i class="icon-close"></i>') !!}--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </td>--}}
                                        <td>{{ \Helpers::formatDate($row->created_at) }}</td>
                                        <td>{{ \Helpers::formatDate($row->updated_at) }}</td>
                                        <td>{{ $row->id }}</td>
                                        <td>
                                            <a class="icon-form" title="edit"
                                               href="{{ route('admin.point.edit', ['id' => $row->id, 'page' => $data['list']->currentPage(), 'parent_id' => (request()->has('parent_id') ? request()->get('parent_id') : '')]) }}">
                                                <i class="icon-note"></i>
                                            </a>
                                            <a class="icon-form status active"
                                               href="{{ route('admin.point.status', ['id' => $row->id, 'field' => 'status']) }}">
                                                {!! (($row->status == 1) ? '<i class="icon-check"></i>' : '<i class="icon-close"></i>') !!}
                                            </a>
                                            <a class="icon-form"
                                               href="javascript:confirmDelete('{{ route('admin.point.destroy', ['id' => $row->id]) }}', '{{ adminNotify::CONFIRM_DELETE }}')">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $data['list']->links('admins::elements.extend.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
