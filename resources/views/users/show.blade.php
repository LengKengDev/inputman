@extends('layouts.app')
@section('content-header')
    <div class="row">
        <div class="col">
            <h1 class="text-white text-uppercase">User {{$user->name}} ({{ $user->email }})</h1>
        </div>
    </div>
@endsection
@section('content-body')
    <div class="row">
        <div class="col-sm-3">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col text-uppercase">
                            <h3>Information</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3>Name</h3>
                            <input type="text" class="form-control form-control-alternative" value="{{ $user->name }}" disabled>
                            <h3>Email</h3>
                            <input type="text" class="form-control form-control-alternative" value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col text-uppercase">
                            <h3>Activities</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($activities as $activity)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                #{{ $activity->subject_id }} {{ $activity->description }}
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

