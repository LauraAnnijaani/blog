@extends('partials.layout')
@section('title', 'Home page')
@section('content')
    <div class="card bg-base-300">
        <div class="card-body">
            <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
                @csrf
                @method('PUT')
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Title</legend>
                    <input value="{{ old('title') ?? $post->title }}" name="title" type="text"
                        class="input w-full @error('title') input-error @enderror" placeholder="Title" />
                    @error('title')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Content</legend>
                    <textarea name="body" class="textarea h-96 w-full @error('body') textarea-error @enderror"
                        placeholder="Write something cool...">{{ old('body') ?? $post->body }}</textarea>
                    @error('body')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset mb-4">
                    <legend class="fieldset-legend">Tags</legend>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($tags as $tag)
                            <label class="cursor-pointer flex items-center gap-2">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    @checked($post->tags->contains($tag->id)) class="checkbox checkbox-primary" />
                                <span>{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
