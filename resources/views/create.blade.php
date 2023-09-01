@extends('layouts.app') <!-- Assuming you have a layout template -->

@section('content')
    <div class="container">
        <h2>Create a New Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="size">Size:</label>
                {{-- <input type="text" class="form-control" id="size" name="size" required> --}}
                <select class="form-control" id="size" name="size">
                    <option value="Small" >Small</option>
                    <option value="Medium" >Medium</option>
                    <option value="Large" >Large</option>
                </select>
            </div>
            <div class="form-group">
                <label for="picture">Picture:</label>
                <input type="file" class="form-control" id="picture" name="picture" required>
            </div>
            @error('picture')
                    <p class="alert alert-danger">{{$message}}</p>
            @enderror
            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
@endsection
