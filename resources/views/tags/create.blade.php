@extends('partials.layout')

@section('title', 'Create Post')

@section('content')
<div class="card bg-base-300 p-6">
    <h2 class="text-2xl font-bold mb-4">Create Post</h2>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <fieldset class="fieldset mb-4">
            <legend class="fieldset-legend">Title</legend>
            <input value="{{ old('title') }}" name="title" type="text"
                   class="input w-full @error('title') input-error @enderror" placeholder="Title" />
            @error('title')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <!-- Content -->
        <fieldset class="fieldset mb-4">
            <legend class="fieldset-legend">Content</legend>
            <textarea name="body" class="textarea h-96 w-full @error('body') textarea-error @enderror"
                      placeholder="Write something cool...">{{ old('body') }}</textarea>
            @error('body')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <!-- Images Upload -->
        <fieldset class="fieldset mb-4">
            <legend class="fieldset-legend">Images</legend>
            <input type="file" name="images[]" multiple class="file-input file-input-bordered w-full" />
            @error('images')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <!-- Tags -->
        <fieldset class="fieldset mb-4">
            <legend class="fieldset-legend">Tags</legend>
            <div class="flex flex-wrap gap-2">
                @foreach($tags as $tag)
                    <label class="cursor-pointer flex items-center gap-2">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                               class="checkbox checkbox-primary" />
                        <span>{{ $tag->name }}</span>
                    </label>
                @endforeach
            </div>
        </fieldset>

        <!-- Submit / Cancel -->
        <button type="submit" class="btn btn-primary mt-4">Create Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-ghost mt-4">Cancel</a>
    </form>
</div>
@endsection
