@extends('layouts.app') <!-- Assuming you have a layout template -->

@section('content')
    <div class="container">
        <h2>{{ $product->name }}</h2>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $product->picture }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h4>Price: ${{ $product->price }}</h4>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Size:</strong> {{ $product->size }}</p>
                <p><strong>Created At:</strong> {{ $product->created_at }}</p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
@endsection
