@extends('layouts.app')

@section('content')

<div class="container my-5">
    <form action="{{ url('place-order') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Detalhes Básicos</h6>

                        <hr>

                        <div class="row checkout-form">
                            <div class="col-md-6 mb-3">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->cpf }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @php
                            $total = 0;
                        @endphp

                        <h6>Detalhes da Compra</h6>

                        <hr>

                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor (R$)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="text-center align-middle">{{ $item->product->name }}</td>
                                        <td class="text-center align-middle">{{ $item->items }}</td>
                                        <td class="text-center align-middle">R$ {{ number_format(($item->product->price * $item->items), 2, ',', '.') }}</td>
                                    </tr>

                                    @php
                                        $total += (($item->product->price) * $item->items);
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <h4 class="px-2">Valor Total: <span class="float-end">R$ {{ number_format($total, 2, ',', '.') }}</span></h4>

                        <hr>

                        <input type="hidden" name="payment_mode" id="payment_mode" value="COD">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-100">Efetuar Pagamento | COD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
