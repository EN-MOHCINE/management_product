@extends('layouts.app') <!-- Assuming you have a layout template -->

@section('content')
    <div class="container">
        <h2>Product List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Size</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($products->isEmpty())
                <tr>
                    <td colspan="6">No products available.</td>
                </tr>
            @else
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img height="100px" width="100px"   src="{{asset('storage/'.$product['picture']) }}"  alt="Product not available" class="img-fluid">                       
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->size }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
    </div>
@endsection
