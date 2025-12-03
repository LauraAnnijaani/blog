@extends('partials.layout')
@section('title', $user->name . "'s Posts")

@section('content')
<div class="mb-4">
    <h1 class="text-3xl font-bold">{{ $user->name }}'s Posts</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
        <div class="card bg-base-200 shadow-lg">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="text-sm text-gray-500 mb-2">Category: {{ $post->category->name ?? 'None' }}</p>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mb-2">
                    @foreach($post->tags as $tag)
                        <span class="badge badge-outline">{{ $tag->name }}</span>
                    @endforeach
                </div>

                <!-- Post snippet -->
                <p>{{ Str::limit(strip_tags($post->body), 100) }}</p>

                <div class="card-actions justify-end mt-2">
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary btn-sm">View</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $posts->links() }} <!-- Pagination links -->
</div>
@endsection
