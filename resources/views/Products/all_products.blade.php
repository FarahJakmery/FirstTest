@extends('layouts.app1')

@section('content')
    <div class="container">
        <table class="table is-striped is-hoverable is-fullwidth">

            {{-- Table Head --}}
            <thead>
                <tr>
                    <th>Product Nunmber</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Option</th>
                </tr>
            </thead>
            {{-- Table Body --}}
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->photo }}</td>
                        <th>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a href="{{ route('add.to.cart', $product->id) }}">
                                        <button class="button is-link">
                                            Add to Cart
                                        </button>
                                    </a>
                                </p>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
