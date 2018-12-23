@extends('layouts.app')
@section('script')
    <script src="{{ mix('js/pages/dashboard.js') }}"></script>
    <script>
      window.dashboard.index();
    </script>
@endsection
@section('content-header')
    @include('home.header')
@endsection
@section('content-body')
<div class="row">
    <div class="col-sm-12">
        <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="text-uppercase text-light ls-1 mb-1">
                            Overview</h6>
                        <h2 class="text-white mb-0 database" data="{{ json_encode($chart->pluck('views')->toArray()) }}" time="{{ json_encode($chart->pluck('date')->toArray()) }}" >Questions</h2>
                    </div>
                    <div class="col">
                        <ul class="nav nav-pills justify-content-end">
                            <li class="nav-item mr-2 mr-md-0"
                                data-toggle="chart" data-target="#chart-sales"
                                data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
                                data-prefix="" data-suffix="">
                                <a href="#" class="nav-link py-2 px-3 active"
                                   data-toggle="tab">
                                    <span class="d-none d-md-block">Month</span>
                                    <span class="d-md-none">M</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Chart -->
                <div class="chart">
                    <!-- Chart wrapper -->
                    <canvas id="chart-sales" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

