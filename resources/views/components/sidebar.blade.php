<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('web.home') }}">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
    </li>
    @hasrole('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('web.users.index' )}}">
                <i class="ni ni-user-run text-blue"></i> Quản lý users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('web.levels.index' )}}">
                <i class="ni ni-album-2 text-blue"></i> Quản lý nhãn câu hỏi
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('web.question_types.index' )}}">
                <i class="ni ni-planet text-blue"></i> Quản lý dạng câu hỏi
            </a>
        </li>
    @endhasanyrole
    <li class="nav-item">
        <a class="nav-link" href="{{ route('web.questions.index') }}">
            <i class="ni ni-shop text-orange"></i> Quản lý câu hỏi
        </a>
    </li>
    {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="./examples/profile.html">--}}
            {{--<i class="ni ni-single-02 text-yellow"></i> User profile--}}
        {{--</a>--}}
    {{--</li>--}}
</ul>
