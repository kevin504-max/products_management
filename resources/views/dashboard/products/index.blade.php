@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                <h1>Gestão de Produtos</h1>
                <button class="btn btn-primary mr-0" data-bs-toggle="modal" data-bs-target="#modalCreateProduct">
                    <i class="fa fa-plus"></i> Registrar Produto
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
