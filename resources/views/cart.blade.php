@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="card-shadow">
        @if ($cartItems->count() > 0)
            <div class="card-body">
                @php
                    $total = 0;
                @endphp

                @foreach ($cartItems as $item)
                    <div class="row mb-3 product_data">
                        <input type="hidden" class="product_id" value="{{ $item->product_id }}">
                        <div class="col-md-5 mt-5">
                            <h4>{{ $item->product->name }}</h4>
                            <p><strong>Código: </strong> {{ $item->product->code }}</p>
                            <p><strong>Valor: </strong>R$ {{ number_format($item->product->price, 2, ',', '.') }}</p>
                        </div>
                        <div class="col-md-2 mt-5">
                            <button class="btn btn-danger delete-cart-item" type="button"><i class="fa fa-trash"></i> Remover</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection

@section('scripts')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.delete-cart-item', function (event) {
        event.preventDefault();

        var product_id = $(this).closest('.product_data').find('.product_id').val();

        $.ajax({
            method: "POST",
            url: "{{ route('cart.removeProduct') }}",
            data: {
                "product_id": product_id,
            },
            success: function(response) {
                Swal.fire({
                    title: response.message,
                    icon: response.status,
                    showConfirmButton: false,
                    timer: 2500
                });

                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        });
    });
</script>

@endsection
