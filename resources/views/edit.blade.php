@extends('layouts.app') <!-- Assuming you have a layout template -->

@section('content')
    <div class="container">
        <h2>Edit Product: {{ $product->name }}</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="size">Size:</label>
                <select class="form-control" id="size" name="size">
                    <option value="Small" {{ $product->size === 'Small' ? 'selected' : '' }}>Small</option>
                    <option value="Medium" {{ $product->size === 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Large" {{ $product->size === 'Large' ? 'selected' : '' }}>Large</option>
                </select>
            </div>

            <div class="form-group">
                <label for="picture">Picture URL:</label>
                <input type="text" class="form-control" id="picture" name="picture" value="{{ $product->picture }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
