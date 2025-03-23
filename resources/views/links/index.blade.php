@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1>Link Shortener</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('links.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="original_url" class="form-label">Original URL</label>
            <input type="url" class="form-control" id="original_url" name="original_url" required>
        </div>
        <div class="mb-3">
            <label for="short_code" class="form-label">Custom Short Code (optional)</label>
            <input type="text" class="form-control" id="short_code" name="short_code">
        </div>
        <button type="submit" class="btn btn-primary">Create Short Link</button>
    </form>

    <h2 class="mt-5">Your Links</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Original URL</th>
                <th>Short URL</th>
                <th>Clicks</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($links as $link)
            <tr>
                <td>{{ $link->original_url }}</td>
                <td><a href="{{ route('links.show', $link->short_code) }}" target="_blank">{{ url($link->short_code) }}</a></td>
                <td>{{ $link->clicks }}</td>
                <td>
                    <form action="{{ route('links.destroy', $link) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection