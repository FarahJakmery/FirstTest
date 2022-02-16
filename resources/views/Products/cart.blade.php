@extends('layouts.app1')

@section('content')
    <table id="cart" class="table is-striped is-hoverable is-fullwidth">

        {{-- Table Head --}}
        <thead>
            <tr>
                <th>Product Photo</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Option</th>
            </tr>
        </thead>

        {{-- Table Body --}}
        <tbody>
            @php
                $total = 0;
            @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php
                        $total += $details['price'] * $details['quantity'];
                    @endphp
                    <tr data-id="{{ $id }}">
                        {{-- Product Photo --}}
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-9 hidden-xs">
                                    <img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive" />
                                </div>
                            </div>
                        </td>
                        {{-- Product Name --}}
                        <td data-th="Name">{{ $details['name'] }}</td>
                        {{-- Product Price --}}
                        <td data-th="Price">{{ $details['price'] }}$</td>
                        {{-- Product Quantity --}}
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}"
                                class="form-control quantity update-cart" />
                        </td>
                        {{-- Product Subtotal --}}
                        <td data-th="Subtotal" class="text-center">
                            {{ $details['price'] * $details['quantity'] }}$
                        </td>
                        {{-- Remove From Cart Button --}}
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>

        {{-- Table Footer --}}
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3>
                        <strong>Total: {{ $total }}$</strong>
                    </h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-warning">
                        <i class="fa fa-angle-left"></i>
                        Continue Shopping
                    </a>
                </td>
            </tr>
        </tfoot>

    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },

                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(one, two, three) {
                        console.log(one);
                        console.log(two);
                        console.log(three);

                    }
                });
            }
        });
    </script>
@endsection
