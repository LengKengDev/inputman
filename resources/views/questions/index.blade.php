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
                                    <td>{{ str_limit($item->title, 80) }}</td>
                                    <td><span class="badge badge-primary">{{ $item->questionType->name }}</span></td>
                                    <td>
                                        <span class="badge badge-info">{{ $item->level }}</span>
                                    </td>
                                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                                    <td>
                                        {{ link_to_route('web.questions.edit', 'Edit', $item, ['class' => 'btn btn-primary']) }}
                                        {{ link_to_route('web.questions.destroy', 'Delete', $item, ['class' => 'btn btn-danger btn-question-destroy', 'data' => $item->id]) }}
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

