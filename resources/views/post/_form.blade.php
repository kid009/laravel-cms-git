<div class="mb-3">
    <label for="category_id">Category</label>
    <select class="form-select mt-2 @error('category_id') is-invalid @enderror" id="category_id"
        name="category_id">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="title">Title</label>
    <input type="text" class="form-control mt-2 @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $post->title) ?? '' }}">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description">Description</label>
    <input type="text" class="form-control mt-2 @error('description') is-invalid @enderror" id="description" name="description"
        value="{{ old('description', $post->description) ?? '' }}">
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="content">Content</label>
    <input id="x" type="hidden" name="content" value="{{old('content', $post->content) ?? ''}}">
    <trix-editor input="x"></trix-editor>
    @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tag_ids">Tags</label>
    <select class="form-select mt-2 @error('tag_ids') is-invalid @enderror" id="tag_ids"
        name="tag_ids[]" multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}"
                {{ in_array($tag->id, old('tag_ids', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>
    @error('tag_ids')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
