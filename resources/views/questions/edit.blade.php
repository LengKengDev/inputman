@extends('layouts.app')
@section('script')
    <script src="{{ mix('js/pages/questions.js') }}"></script>
    <script>
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
                            <h3>Chỉnh sửa câu hỏi</h3>
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
                                        {{ Form::select('question_types[]', \App\Entities\QuestionType::all(['id', 'name'])->pluck('name', 'id')->toArray(), $question->questionTypes->pluck('id'), ['placeholder' => 'Pick a type...', 'class' => 'form-control form-control-alternative', 'multiple' => true, 'required' => true]) }}
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="description">Level:</label>
                                        {{ Form::select('level_id', \App\Entities\Level::all(['id', 'name'])->pluck('name', 'id')->toArray(), $question->level->id, ['placeholder' => 'Pick a level...', 'class' => 'form-control form-control-alternative', 'required' => true]) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Question:</label>
                                    <textarea id="editor" class="form-control form-control-alternative" rows="3" placeholder="Write a large text here ..." name="title" required>{{ $question->title }}</textarea>
                                </div>
                                <label for="options">Options:</label>
                                @foreach($question->answers as $index => $option)
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                {{Form::hidden("answers[$index][is_correct]", 0)}}
                                                <input type="checkbox" value="1" aria-label="checkbox" name="answers[{{$index}}][is_correct]" {{ $option['is_correct'] == 1 ? 'checked' : "" }}>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Text input with radio button" name="answers[{{$index}}][content]" required value="{{ $option['content'] }}">
                                    </div>
                                    <br>
                                @endforeach
                                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Save</button>
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
    @include('questions.toolbar')
@endsection

