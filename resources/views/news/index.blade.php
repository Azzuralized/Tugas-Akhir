@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>News</h1>

        @foreach ($news as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->content }}</p>
                    <p class="card-text"><small class="text-muted">{{ $article->created_at->format('F d, Y') }}</small></p>
                </div>
            </div>
        @endforeach

        @if ($news->isEmpty())
            <p>No news articles found.</p>
        @endif
    </div>
@endsection
