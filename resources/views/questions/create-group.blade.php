@extends('layouts.app')
@section('script')
    <script src="{{ mix('js/pages/questions.js') }}"></script>
    <script>
      window.question.group();
      window.question.editor();
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
                        <div class="col text-uppercase">
                            <h3>Tạo mới <span class="badge badge-primary badge-pill">{{ $kind }}</span></h3>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-cog fa-spin"></i> Đổi dạng
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('web.questions.create', ['kind' => 'normal']) }}">Normal</a>
                                    <a class="dropdown-item" href="{{ route('web.questions.create', ['kind' => 'group']) }}">Group</a>
                                </div>
                            </div>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('web.questions.index') }}" class="btn btn-outline-danger"><i class="fa fa-fw fa-angle-left"></i>Quay lại</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3">
                            {!! Form::open(['route' => 'web.questions.store']) !!}
                                <input type="hidden" name="kind" value="{{ $kind }}">
                                <div class="row">
                                    <div class="form-group col-9">
                                        <label for="description">Type:</label>
                                        {{ Form::select('question_types[]', \App\Entities\QuestionType::all(['id', 'name'])->pluck('name', 'id')->toArray(), null, ['placeholder' => 'Pick a type...', 'class' => 'form-control form-control-alternative', 'multiple' => true, 'required' => true]) }}
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="description">Level:</label>
                                        {{ Form::select('level_id', \App\Entities\Level::all(['id', 'name'])->pluck('name', 'id')->toArray(), null, ['placeholder' => 'Pick a level...', 'class' => 'form-control form-control-alternative', 'required' => true]) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Main question:</label>
                                    <textarea id="editor" class="form-control form-control-alternative" rows="3" placeholder="Write a large text here ..." name="title" required>{{old('title')}}</textarea>
                                </div>
                                <div class="row sub-questions">

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <a href="#" class="btn btn-outline-danger btn-sm btn-add-sub-question"><i class="fa fa-fw fa-plus"></i> Add sub-question</a>
                                    </div>
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
    @include('questions.toolbar')
@endsection

