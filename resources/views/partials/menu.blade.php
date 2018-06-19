
<div class="scrollbar-inner">
    <div class="user hidden-xs-up">
        @guest
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
        </div>
        @else
            <div class="user__info" data-toggle="dropdown">

                <div>
                    <div class="user__name">{{ Auth::user()->name }} </div>
                    <div class="user__email">{{ Auth::user()->email }} </div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @endguest
    </div>

    <ul class="navigation">

        {!! \AdminMenu::show() !!}

    </ul>
</div>