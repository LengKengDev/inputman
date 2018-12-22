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
            <h1 class="text-white text-uppercase">Quản lý users</h1>
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
                            <a href="{{ route('web.users.create') }}" class="btn btn-outline-primary"><i class="fa fa-fw fa-plus"></i>Thêm mới</a>
                        </div>
                        <div class="col">
                            {!! Form::open(['route' => 'web.users.index', 'method' => 'GET']) !!}
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
                            <th scope="col">Email</th>
                            <th scope="col">name</th>
                            <th>Role</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <span class="badge badge-info">{{ $item->getRoleNames()->first() }}</span>
                                    </td>
                                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                                    <td>
                                        {{ link_to_route('web.users.show', 'View', $item, ['class' => 'btn btn-primary']) }}
                                        @if(!$item->hasRole('admin'))
                                            {{ link_to_route('web.users.destroy', 'Delete', $item, ['class' => 'btn btn-danger btn-user-destroy', 'data' => $item->id]) }}
                                            {!! Form::open(['route' => ['web.users.destroy', $item->id], 'method' => 'DELETE', 'class' => "hidden destroy-{$item->id}"]) !!}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

