<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('web.home') }}">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('web.question_types.index' )}}">
            <i class="ni ni-planet text-blue"></i> Dạng câu hỏi
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('web.questions.index') }}">
            <i class="ni ni-shop text-orange"></i> Câu hỏi
        </a>
    </li>
    {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="./examples/profile.html">--}}
            {{--<i class="ni ni-single-02 text-yellow"></i> User profile--}}
        {{--</a>--}}
    {{--</li>--}}
</ul>
