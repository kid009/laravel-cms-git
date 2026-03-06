<div class="mb-3">
    <label for="name">Category Name</label>
    <input type="text" class="form-control mt-2 @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $category->name) ?? '' }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
