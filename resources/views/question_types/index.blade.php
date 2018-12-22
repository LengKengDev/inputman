@extends('layouts.app')
@section('script')
    <script src="{{ mix('js/pages/users.js') }}"></script>
    <script>
      window.user.index();
    </script>
@endsection
@section('content-header')
    <div class="row">
        <div class="col">
            <h1 class="text-white text-uppercase">Quản lý loại câu hỏi</h1>
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
                            <a href="{{ route('web.question_types.create') }}" class="btn btn-outline-primary"><i class="fa fa-fw fa-plus"></i>Thêm mới</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($questionTypes as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                                    <td>
                                        {{ link_to_route('web.question_types.edit', 'Edit', $item, ['class' => 'btn btn-primary btn-sm']) }}
                                        {{ link_to_route('web.question_types.destroy', 'Delete', $item, ['class' => 'btn btn-danger btn-user-destroy btn-sm', 'data' => $item->id]) }}
                                        {!! Form::open(['route' => ['web.question_types.destroy', $item->id], 'method' => 'DELETE', 'class' => "hidden destroy-{$item->id}"]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

