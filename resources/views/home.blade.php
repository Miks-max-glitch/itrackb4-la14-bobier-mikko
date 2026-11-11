@extends('layouts.app')

@section('content')
<style>
    :root {
        --cream: #faf6ee;
        --sage: #6b8f71;
        --sage-dark: #4f6f55;
        --sage-soft: #e3ece4;
        --ink: #3a3a34;
        --muted: #7a7a6e;
    }
    .hero {
        background: linear-gradient(135deg, var(--cream) 0%, var(--sage-soft) 100%);
        border-radius: 1.5rem;
        padding: 3.5rem 2.5rem;
        box-shadow: 0 10px 30px rgba(79, 111, 85, .12);
    }
    .hero h2 {
        font-family: Georgia, 'Times New Roman', serif;
        font-weight: 700;
        font-size: clamp(1.9rem, 4vw, 2.8rem);
        line-height: 1.2;
        color: var(--ink);
    }
    .hero .lead { color: var(--muted); max-width: 34rem; }
    .btn-sage {
        background: var(--sage);
        border: 0;
        color: #fff;
        padding: .75rem 1.75rem;
        border-radius: 999px;
        font-weight: 600;
        transition: transform .15s ease, background .15s ease;
    }
    .btn-sage:hover { background: var(--sage-dark); color: #fff; transform: translateY(-2px); }
    .profile {
        background: rgba(255, 255, 255, .7);
        border-radius: 1.25rem;
        padding: 1.5rem;
        text-align: center;
    }
    .profile img {
        border: 4px solid #fff;
        box-shadow: 0 4px 14px rgba(0, 0, 0, .12);
        object-fit: cover;
    }
    .stat-card {
        border: 0;
        border-radius: 1.25rem;
        background: var(--cream);
        box-shadow: 0 6px 18px rgba(0, 0, 0, .06);
        transition: transform .2s ease;
    }
    .stat-card:hover { transform: translateY(-4px); }
    .stat-icon {
        width: 3.25rem; height: 3.25rem;
        display: inline-flex; align-items: center; justify-content: center;
        border-radius: 50%;
        background: var(--sage-soft);
        font-size: 1.5rem;
    }
    .stat-number {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 2.75rem;
        font-weight: 700;
        color: var(--sage-dark);
        line-height: 1;
    }
</style>

<section class="hero">
    <div class="row align-items-center g-4">
        <div class="col-md-8">
            <h2 class="mb-3">Find your next read, or see what's already on the shelf</h2>
            <p class="lead mb-4">
                Browse the whole collection by genre, search by title, and open any
                book to see who wrote it and when.
            </p>
            <a href="{{ route('books.index') }}" class="btn btn-sage btn-lg">Browse the books &rarr;</a>
        </div>

        <div class="col-md-4">
            <div class="profile">
                <img src="{{ asset('img/me.jpg') }}" width="150" height="150"
                     class="rounded-circle mb-3" alt="Photo of Mikko S. Bobier">
                <div class="fw-semibold" style="color: var(--ink)">Mikko S. Bobier</div>
                <div class="small" style="color: var(--muted)">
                    BSINFOTECH &middot; ITRACKB4<br>
                    Block 4A &middot; 2026
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row g-4 mt-2">
    <div class="col-sm-6">
        <div class="card stat-card text-center h-100">
            <div class="card-body py-4">
                <span class="stat-icon mb-3">📚</span>
                <div class="stat-number">{{ $bookCount }}</div>
                <div class="mt-1" style="color: var(--muted)">Books in the collection</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card stat-card text-center h-100">
            <div class="card-body py-4">
                <span class="stat-icon mb-3">🌿</span>
                <div class="stat-number">{{ $genreCount }}</div>
                <div class="mt-1" style="color: var(--muted)">Genres to browse</div>
            </div>
        </div>
    </div>
</div>
@endsection