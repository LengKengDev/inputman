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
            <h1 class="text-white text-uppercase">Quản lý nhãn câu hỏi</h1>
        </div>
    </div>
@endsection
@section('content-body')
    <div class="row">
        <div class="col-sm-4">
            <div class="card shadow">
                <div class="card-header">Thêm mới</div>
                <div class="card-body">
                    {!! Form::open(['route' => ['web.levels.store'], 'method' => 'POST']) !!}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control form-control-alternative" id="name" name="name" placeholder="Write a name here ..." required value="{{ old('name') }}">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Save</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card shadow">
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
                            @foreach($levels as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                                    <td>
                                        {{ link_to_route('web.levels.edit', 'Edit', $item, ['class' => 'btn btn-primary btn-sm']) }}
                                        {{ link_to_route('web.levels.destroy', 'Delete', $item, ['class' => 'btn btn-danger btn-sm btn-user-destroy', 'data' => $item->id]) }}
                                        {!! Form::open(['route' => ['web.levels.destroy', $item->id], 'method' => 'DELETE', 'class' => "hidden destroy-{$item->id}"]) !!}
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

