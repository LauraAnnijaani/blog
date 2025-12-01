@extends('partials.layout')
@section('title', 'Dashboard page')
@section('content')
    {{ $posts->links() }}
    <div class="grid grid-cols-4 gap-2">
        @foreach ($posts as $post)
            <div class="card bg-base-300 shadow-sm">

                @if ($post->images->count() === 1)
                    <figure>
                        <img src="{{ $post->images->first()->url }}" />
                    </figure>
                @elseif($post->images->count() > 1)
                    <div class="carousel rounded-box">
                        @foreach ($post->images as $image)
                            <div class="carousel-item w-full">
                                <img src="{{ $image->url }}" />
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p>{{ $post->snippet }}</p>
                    <p class="text-neutral-content">{{ $post->user->name }}</p>
                    <p class="text-neutral-content">{{ $post->created_at->diffForHumans() }}</p>
                    <p class="text-neutral-content"><b>Comments:</b> {{ $post->comments_count }}</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('post', ['post' => $post]) }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }}
@endsection
