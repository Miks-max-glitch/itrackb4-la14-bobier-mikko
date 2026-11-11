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
    @media (max-width: 991.98px) {
        .nav-sage .nav-link { margin: .25rem 0 0; }
    }
</style>

<nav class="navbar navbar-expand-lg nav-sage" data-bs-theme="dark">
    <div class="container-fluid px-lg-4">
        <a class="navbar-brand" href="{{ route('home') }}">📖 Libsys Portal</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}"
                       href="{{ route('books.index') }}">Books</a>
                </li>
            </ul>
        </div>
    </div>
</nav>