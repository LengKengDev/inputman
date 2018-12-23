@extends('layouts.app')
@section('script')
    <script src="{{ mix('js/pages/questions.js') }}"></script>
    <script>
      window.question.group();
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
                            <h3>Chỉnh sửa<span class="badge badge-primary badge-pill">{{ $question->kind }}</span></h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('web.questions.index') }}" class="btn btn-outline-danger"><i class="fa fa-fw fa-angle-left"></i>Quay lại</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3">
                            {!! Form::open(['route' => ['web.questions.update', $question->id], 'method' => 'PUT']) !!}
                                <div class="row">
                                    <div class="form-group col-9">
                                        <label for="description">Type:</label>
                                        {{ Form::select('question_types[]', \App\Entities\QuestionType::all(['id', 'name'])->pluck('name', 'id')->toArray(), $question->questionTypes->pluck('id'), ['placeholder' => 'Pick a type...', 'class' => 'form-control form-control-alternative', 'multiple' => true]) }}
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="description">Level:</label>
                                        {{ Form::select('level_id', \App\Entities\Level::all(['id', 'name'])->pluck('name', 'id')->toArray(), $question->level_id, ['placeholder' => 'Pick a level...', 'class' => 'form-control form-control-alternative']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Main question:</label>
                                    <textarea class="form-control form-control-alternative" rows="3" placeholder="Write a large text here ..." name="title" required>{{ $question->title }}</textarea>
                                </div>
                                <div class="row sub-questions">
                                    @foreach($question->answers as $key => $sub)
                                        <div class="col-sm-12 card card-frame mb-4 pt-3">
                                            <a href="#" class="btn btn-outline-danger pull-right btn-sm btn-rm-sub">Remove</a>
                                            <div class="row sub-question card-body">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="title">Question:</label>
                                                        <input class="form-control form-control-alternative"
                                                               placeholder="Write a text here ..." name="answers[{{$key}}][content]" required value="{{$sub['content']}}">
                                                    </div>
                                                    <label for="title">Option:</label>
                                                    <div class="row">
                                                        @foreach($sub['answers'] as $index => $answer)
                                                            <div class="col-sm-6">
                                                                <div class="input-group input-group-alternative ">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <input type="hidden" value="0" name="answers[{{$key}}][answers][{{$index}}][is_correct]">
                                                                            <input type="checkbox" value="1" aria-label="checkbox"
                                                                                   name="answers[{{$key}}][answers][{{$index}}][is_correct]" {{$answer['is_correct'] == 1 ? 'checked' : ''}}>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text" class="form-control" placeholder="Text input with radio button"
                                                                           name="answers[{{$key}}][answers][{{$index}}][content]" required value="{{$answer['content']}}">
                                                                </div>
                                                                <br>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <a href="#" class="btn btn-outline-danger btn-sm btn-add-sub-question"><i class="fa fa-fw fa-plus"></i> Add sub-question</a>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Update</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center active">
                            History
                        </li>
                        @foreach($activities as $activity)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $activity->description }}
                                <span class="badge badge-primary badge-pill">
                                    {{ $activity->created_at->diffForHumans() }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

