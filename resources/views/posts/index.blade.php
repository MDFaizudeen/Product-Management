<!-- Include Bootstrap CSS in your layout (or add this to the head section) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Posts</h1>
        <div>
            <a href="{{ route('posts.trashed') }}" class="btn btn-secondary me-2">View Trashed Posts</a>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul class="list-group">
        @foreach($posts as $post)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $post->product }}</strong> - {{ $post->content }}
                </div>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
