<h1>Trashed Posts</h1>
    <a href="{{ route('posts.index') }}">Back to Posts</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @forelse($posts as $post)
            <li>
                <strong>{{ $post->product }}</strong> - {{ $post->content }}
                <form action="{{ route('posts.restore', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Restore</button>
                </form>

                <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure? This cannot be undone.')">Delete Permanently</button>
                </form>
            </li>
        @empty
            <p>No trashed posts found.</p>
        @endforelse
    </ul>