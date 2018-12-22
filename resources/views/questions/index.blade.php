@extends('layouts.app')
@section('script')
    <script src="{{ mix('js/pages/questions.js') }}"></script>
    <script>
        window.question.index();
    </script>
@endsection
@section('content-header')
    <div class="row">
        <div class="col">
            <h1 class="text-white text-uppercase">Quản lý câu hỏi</h1>
        </div>
    </div>
@endsection
@section('content-body')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <a href="{{ route('web.questions.create') }}" class="btn btn-outline-primary"><i class="fa fa-fw fa-plus"></i>Thêm mới</a>
                        </div>
                        <div class="col">
                            {!! Form::open(['route' => 'web.questions.index', 'method' => 'GET']) !!}
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Search" type="text" name="search" value="{{ Request::input('search') }}">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th>#ID</th>
                            <th scope="col">Title</th>
                            <th>Type</th>
                            <th>Level</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ str_limit($item->title, 60) }}</td>
                                    <td>
                                        @foreach($item->questionTypes as $type)
                                            <span class="badge badge-pill badge-{{array_random(['info', 'success', 'warning', 'primary', 'danger'])}}"
                                                  data-toggle="tooltip" data-placement="top" title="{{ $type->name }}">
                                                {{ str_limit($type->name, 10) }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{ $item->level->name }}</span>
                                    </td>
                                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                                    <td>
                                        {{ link_to_route('web.questions.edit', 'Edit', $item, ['class' => 'btn btn-primary btn-sm']) }}
                                        {{ link_to_route('web.questions.destroy', 'Delete', $item, ['class' => 'btn btn-danger btn-question-destroy btn-sm', 'data' => $item->id]) }}
                                        {!! Form::open(['route' => ['web.questions.destroy', $item->id], 'method' => 'DELETE', 'class' => "hidden destroy-{$item->id}"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

