<h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label>Product</label>
        <input type="text" name="product" value="{{ old('product') }}">
        @error('product') <p>{{ $message }}</p> @enderror

        <label>Content</label>
        <textarea name="content">{{ old('content') }}</textarea>
        @error('content') <p>{{ $message }}</p> @enderror

        <button type="submit">Create</button>
    </form>