@extends('layouts.app' )

@section('content')
<div class="container">

    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>
            Bem vindo ao Dashboard de Gerenciamento de Conteúdo
        </h1>

        <div class="content mt-5 col-md-4">
            @if ($products->count() > 0)
                @foreach ($products as $product)
                    <form>
                        @csrf
                        <div class="card shadow mt-2 product_data">
                            <input type="hidden" class="product_id" value="{{ $product->id }}">
                            <div class="card-header">
                                <h3>{{ $product->name }}</h3>
                            </div>

                            <div class="card-body">
                                <p><strong>Código: </strong> {{ $product->code }}</p>
                                <p><strong>Valor: </strong>R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                            </div>

                            <div class="card-footer">
                                <div class="input-group text-center justify-content-center mb-3" style="width: 120px;">
                                    <span class="input-group-prepend bg-white border-0 mt-3">
                                        <button class="btn btn-sm btn-outline-secondary decrement-btn" id="decrement-btn" type="button">-</button>
                                    </span>
                                    <input type="text" class="form-control text-center border-0 qty-input" id="quantity" name="quantity" value="1">
                                    <span class="input-group-append bg-white border-0 mt-3">
                                        <button class="btn btn-sm btn-outline-secondary increment-btn" id="increment-btn" type="button">+</button>
                                    </span>
                                </div>

                            </div>

                            <button class="btn btn-primary btn-md p-1 m-3 addCartBtn" type="button">Adicionar ao carrinho</button>
                        </div>
                    </form>

                    <hr>
                @endforeach
            @endif
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>

    $(document).on('click', '.increment-btn', function (event) {
        event.preventDefault();

        var inc_value = $(this).closest(".product_data").find(".qty-input").val();
        var value = parseInt(inc_value, 10);

        value = isNaN(value) ? 0 : value;

        if (value < 10) {
            value++;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });

    $(document).on('click', '.decrement-btn', function (event) {
        event.preventDefault();

        var dec_value = $(this).closest(".product_data").find(".qty-input").val();
        var value = parseInt(dec_value, 10);

        value = isNaN(value) ? 0 : value;

        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });

    $('.addCartBtn').on('click', function (event) {
        event.preventDefault();

        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var quantity = $(this).closest('.product_data').find('.qty-input').val();

        $.ajax({
            method: "POST",
            url: "{{ route('cart.addProduct') }}",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: product_id,
                quantity: quantity
            },
            success: function(response) {
                Swal.fire({
                    title: response.message,
                    icon: response.status,
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        })
    });
</script>
@endsection
