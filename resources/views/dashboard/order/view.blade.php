@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Visualizar Pedido
                        <a href="{{ route('dashboard.orders.index') }}" class="btn btn-danger text-white float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Detalhes da Compra</h4>

                            <label for="user">Cliente</label>
                            <div class="border mb-3">{{ $order->user->name }}</div>

                            <label for="email">E-mail</label>
                            <div class="border mb-3">{{ $order->user->email }}</div>

                            <label for="cpf">CPF</label>
                            <div class="border mb-3">{{ $order->user->cpf }}</div>

                            <label for="total_price">Valor Total</label>
                            <div class="border mb-3">${{ number_format($order->total_price, 2, ',', '.') }}</div>

                            <label for="total_price">Data do Pedido</label>
                            <div class="border mb-3">{{ $order->created_at->format('d/m/Y') }}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Detalhes do Pedido</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Produto</th>
                                        <th class="text-center align-middle">Quantidade</th>
                                        <th class="text-center align-middle">PReço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($order->orderItems as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->product->name . " - " . $item->product->code }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-center">R$ {{ number_format($item->product->price, 2, ',', '.') }}</td>
                                        </tr>
                                    @empty
                                        <div class="text-center" colspan="6">
                                            <img src="{{ asset('assets/logging-off.svg') }}" alt="Nada para ver por aqui..."  class="w-40">
                                            <h4>Nada para ver por aqui...</h4>
                                            <a href="{{ url('/dashboard') }}" type="button" class="btn btn-outline-primary"><i class="fa fa-shopping-cart fa-2x"></i> Continuar Comprando</a>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            <h4 class="px-2">Valor Total: <span class="float-end">${{ $order->total_price }}</span></h4>
                            <div class="mt-5">
                                <label for="">Status da Compra</label>
                                <form action="{{ route('dashboard.orders.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" id="id" value="{{ $order->id }}">
                                    <select name="order_status" id="order_status" class="form-select">
                                        <option {{ ($order->status == 0) ? 'selected' : '' }} value="0">Em Aberto</option>
                                        <option {{ ($order->status == 1) ? 'selected' : '' }} value="1">Pago</option>
                                        <option {{ ($order->status == -1) ? 'selected' : '' }} value="-1">Cancelado</option>
                                    </select>
                                    <button class="btn btn-primary mt-3 float-end" type="submit">Atualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $("#order_status").select2({
            width: "100%",
            allowClear: true,
        });
    });
</script>
@endsection
