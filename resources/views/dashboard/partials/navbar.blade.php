<nav class="navbar is-black columns is-mobile is-spaced-between is-vcentered" role="navigation" aria-label="main navigation">
    <div class="navbar-brand column is-narrow">
        <a class="navbar-item" href="{{ url('/') }}">
            @svg('logo-white', 'logo')
        </a>
    </div>

    @auth
        <div class="column is-narrow">
            <b-dropdown position="is-bottom-left" aria-role="menu">
                <button slot="trigger" class="navbar-item has-dropdown">
                    <div class="level is-mobile">
                        <div class="level-left">
                            <b-icon icon="account-circle" size="is-medium"></b-icon>
                            <span></span>
                        </div>
                        <div class="level-right">
                            <b-icon icon="menu-down"></b-icon>
                        </div>
                    </div>
                </button>

                <b-dropdown-item custom aria-role="menuitem">
                    <p><strong>{{ $user->name }}</strong></p>

                    @if ($user->partners->count())
                        <p>{{ $user->partners->first()->title }}</p>
                    @endif
                </b-dropdown-item>

                <hr class="dropdown-divider">

                <b-dropdown-item has-link aria-role="listitem">
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                        <a onclick="event.target.parentNode.submit()" class="media">
                            {{ __('Logout') }}
                        </a>
                    </form>
                </b-dropdown-item>
            </b-dropdown>
        </div>
    @endauth
</nav>
