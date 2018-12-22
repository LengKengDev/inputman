@extends('layouts.app')
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
                        <div class="col text-uppercase">
                            <h3>Tạo mới</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('web.users.index') }}" class="btn btn-outline-danger"><i class="fa fa-fw fa-angle-left"></i>Quay lại</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            {!! Form::open(['route' => 'web.users.store']) !!}
                                <h3>Email</h3>
                                <div class="input-group input-group-alternative">
                                    <input type="email" class="form-control" placeholder="Email" name="email" required value="{{old('email')}}">
                                </div>
                                <br>
                                <h3>Name</h3>
                                <div class="input-group input-group-alternative">
                                    <input type="text" class="form-control" placeholder="Username" name="name" required value="{{old('name')}}">
                                </div>
                                <br>
                                <h3>Password</h3>
                                <div class="input-group input-group-alternative">
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                                <br>
                                <h3>Password confirmation</h3>
                                <div class="input-group input-group-alternative">
                                    <input type="password" class="form-control" placeholder="Password confirmation" name="password_confirmation" required>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Create</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

