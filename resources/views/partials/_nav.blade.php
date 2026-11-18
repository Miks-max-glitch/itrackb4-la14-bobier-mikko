<style>
    .nav-sage {
        background: #4f6f55;
        box-shadow: 0 4px 14px rgba(79, 111, 85, .25);
        padding-top: .75rem;
        padding-bottom: .75rem;
    }
    .nav-sage .navbar-brand {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        font-size: 1.35rem;
        letter-spacing: .3px;
        color: #faf6ee;
    }
    .nav-sage .nav-link {
        color: #e3ece4;
        border-radius: 999px;
        padding: .45rem 1.1rem;
        margin-left: .25rem;
        font-weight: 500;
        transition: background .15s ease, color .15s ease;
    }
    .nav-sage .nav-link:hover {
        background: rgba(250, 246, 238, .15);
        color: #fff;
    }
    .nav-sage .nav-link.active {
        background: #faf6ee;
        color: #4f6f55;
        font-weight: 600;
    }
    .nav-sage .navbar-toggler {
        border-color: rgba(250, 246, 238, .5);
    }
    .nav-sage .nav-user {
        color: #faf6ee;
        font-weight: 600;
        padding: .45rem .75rem;
    }
    .nav-sage button.nav-link {
        background: transparent;
        border: 0;
    }
    @media (max-width: 991.98px) {
        .nav-sage .nav-link { margin: .25rem 0 0; }
    }
</style>

<nav class="navbar navbar-expand-lg nav-sage" data-bs-theme="dark">
    <div class="container-fluid px-lg-4">
        <a class="navbar-brand me-lg-3" href="{{ route('home') }}">📖 Libsys Portal</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            {{-- Left side, next to the brand --}}
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}"
                       href="{{ route('books.index') }}">Books</a>
                </li>
            </ul>

            {{-- Right side: changes for guests and signed-in users --}}
            <ul class="navbar-nav ms-lg-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                           href="{{ route('login') }}">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                           href="{{ route('register') }}">Register</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <span class="nav-user">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link">Log out</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>