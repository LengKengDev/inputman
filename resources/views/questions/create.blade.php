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
                            <a href="{{ route('web.questions.index') }}" class="btn btn-outline-danger"><i class="fa fa-fw fa-angle-left"></i>Quay lại</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3">
                            {!! Form::open(['route' => 'web.questions.store']) !!}
                                <div class="row">
                                    <div class="form-group col-9">
                                        <label for="description">Type:</label>
                                        {{ Form::select('question_types[]', \App\Entities\QuestionType::all(['id', 'name'])->pluck('name', 'id')->toArray(), null, ['placeholder' => 'Pick a type...', 'class' => 'form-control form-control-alternative', 'multiple' => true]) }}
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="description">Level:</label>
                                        {{ Form::select('level_id', \App\Entities\Level::all(['id', 'name'])->pluck('name', 'id')->toArray(), null, ['placeholder' => 'Pick a level...', 'class' => 'form-control form-control-alternative']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Question:</label>
                                    <textarea class="form-control form-control-alternative" rows="3" placeholder="Write a large text here ..." name="title" required>{{old('title')}}</textarea>
                                </div>
                                <label for="options">Options:</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            {{Form::hidden('answers[0][is_correct]', 0)}}
                                            <input type="checkbox" value="1" aria-label="checkbox" name="answers[0][is_correct]">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Text input with radio button" name="answers[0][content]" required>
                                </div>
                                <br>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            {{Form::hidden('answers[1][is_correct]', 0)}}
                                            <input type="checkbox" value="1" aria-label="checkbox" name="answers[1][is_correct]">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Text input with radio button" name="answers[1][content]" required>
                                </div>
                                <br>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            {{Form::hidden('answers[2][is_correct]', 0)}}
                                            <input type="checkbox" value="1" aria-label="checkbox" name="answers[2][is_correct]">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Text input with radio button" name="answers[2][content]" required>
                                </div>
                                <br>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            {{Form::hidden('answers[3][is_correct]', 0)}}
                                            <input type="checkbox" value="1" aria-label="checkbox" name="answers[3][is_correct]">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Text input with radio button" name="answers[3][content]" required>
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

