@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Histórico de Compras
                            <a href="{{ route('dashboard.orders.index') }}" class="btn btn-danger float-end">Novas Compras</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="orderHistoryTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Data do Pedido</th>
                                    <th class="text-center align-middle">N° do Pedido</th>
                                    <th class="text-center align-middle">Valor Total</th>
                                    <th class="text-center align-middle">Status</th>
                                    <th class="text-center align-middle">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td class="text-center">{{ $item->tracking_number }}</td>
                                        <td class="text-center">{{ number_format($item->total_price, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ ($item->status == 0) ? 'Em Aberto' : (($item->status == -1) ? 'Cancelado' : 'Pago') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('dashboard.orders.view', ['id' => $item->id]) }}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="text-center" colspan="6">
                                        <img src="{{ asset('assets/logging-off.svg') }}" alt="Nada para ver por aqui..."  class="w-40">
                                        <h4>Nada para ver por aqui...</h4>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    const table = $('#orderHistoryTable').DataTable({
        responsive: true,
        lengthChange: true,
        length: 20,
        dom: '<"html5buttons"B>lTfgitp',
        order: [
            [0, "desc"]
        ],
        buttons: [
            {
                extend: 'excel',
                title: 'Histórico de Compras'
            },
            {
                extend: 'pdf',
                title: 'Histórico de Compras'
            },
            {
                extend: 'print',
                customize: function(win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');
                    $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
                }
            }
        ]
    })
</script>

@endsection
