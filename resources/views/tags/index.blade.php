@extends('partials.layout')

@section('title', 'Tags')

@section('content')
<div class="card bg-base-300 p-6">
    <h2 class="text-2xl font-bold mb-4">Tags</h2>

    <a class="btn btn-primary mb-4" href="{{ route('tags.create') }}">Create New Tag</a>

    <table class="table w-full">
        <thead>
            <tr>
                <th>Name</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td class="text-right">
                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('tags.destroy', $tag) }}" method="POST"
                              class="inline-block"
                              onsubmit="return confirm('Delete this tag?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-error">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
