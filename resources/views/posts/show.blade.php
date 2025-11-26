@extends('partials.layout')
@section('title', 'View Post')
@section('content')
    <div class="card bg-base-300">
        <div class="card-body">
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Title</legend>
                <p class="bg-base-200 p-2">{{ $post->title }}</p>
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Content</legend>
                <div class="textarea h-96 w-full bg-base-200 p-2 rounded">
                    {!! $post->body !!}
                </div>
            </fieldset>

            <div class="mt-4 flex gap-2">
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-error">Delete</button>
                </form>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
            </div>
            <fieldset class="fieldset">
                <p><strong>Author:</strong> {{ $post->user->name ?? 'Unknown' }}</p>
                <p><strong>Created at:</strong> {{ $post->created_at->format('d M Y H:i') }}</p>
                <p><strong>Last updated:</strong> {{ $post->updated_at->format('d M Y H:i') }}</p>
            </fieldset>
        </div>
    </div>
@endsection
