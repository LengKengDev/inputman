@extends('layouts.app')
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
                        <div class="col text-uppercase">
                            <h3>Chỉnh sửa</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('web.question_types.index') }}" class="btn btn-outline-danger"><i class="fa fa-fw fa-angle-left"></i>Quay lại</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3">
                            {!! Form::open(['route' => ['web.question_types.update', $questionType], 'method' => 'PUT']) !!}
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control form-control-alternative" id="name" name="name" placeholder="Write a name here ..." required value="{{ $questionType->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control form-control-alternative" rows="3" placeholder="Write a large text here ..." name="description" required>{{ $questionType->description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Save</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

