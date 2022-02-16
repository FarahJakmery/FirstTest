@extends('layouts.app1')

@section('content')
    <div class="container">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="field">
                {{-- Product name --}}
                <div class="field">
                    <label class="label">Product name</label>
                    <div class="control">
                        <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name"
                            placeholder="Product name..." value="{{ old('name') }}">
                    </div>
                </div>

                {{-- Product Price --}}
                <div class="field">
                    <label class="label">Product Price</label>
                    <div class="control">
                        <input class="input {{ $errors->has('price') ? 'is-danger' : '' }}" type="text" name="price"
                            placeholder="Product price..." value="{{ old('price') }}">
                    </div>
                </div>

                {{-- Product Description --}}
                <div class="field">
                    <label class="label">Product Description</label>
                    <div class="control">
                        <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description"
                            placeholder="Product description goes here ...">{{ old('description') }}
                                                        </textarea>
                        @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Product Photo --}}
                <div class="field">
                    <label class="label">Photo</label>
                    <div class="control">
                        <input class="input {{ $errors->has('featured_image') ? 'is-danger' : '' }}" type="text"
                            name="photo" placeholder="https://www.domain.com/test-image.jpg" value="{{ old('photo') }}">
                        @error('photo')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
