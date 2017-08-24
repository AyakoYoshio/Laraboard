<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <span class="navbar-brand">Laraboard</span>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>{!! link_to_route('threads.index', 'スレッド一覧') !!}</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
                    <li>{!! link_to_route('login', 'ログイン') !!}</li>
                    <li>{!! link_to_route('register', 'ユーザー登録') !!}</li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{csrf_field()}}
                            </form>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
