@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Gestão de Clientes</h1>
            <button class="btn btn-primary float-end mr-0" data-bs-toggle="modal" data-bs-target="#modalCreateUser">
                <i class="fa fa-plus"></i> Registrar Cliente
            </button>
        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">CPF</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="text-center align-middle">{{ $user->id }}</td>
                            <td class="text-center align-middle">{{ $user->name }}</td>
                            <td class="text-center align-middle">{{ $user->email }}</td>
                            <td class="text-center align-middle">{{ $user->cpf }}</td>
                            <td class="text-center align-middle">
                                <button
                                    class="btn btn-primary"
                                    type="button"
                                    data-bs-target="#modalUpdateUser"
                                    data-bs-toggle="modal"
                                    data-user="{{ $user }}"
                                >
                                    <i class="fa fa-pen"></i>
                                </button>

                                <button
                                    class="btn btn-danger"
                                    type="button"
                                    data-bs-target="#modalDeleteUser"
                                    data-bs-toggle="modal"
                                    data-id="{{ $user->id }}"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('assets/logging-off.svg') }}" alt="Nada para ver aqui..." class="w-50 mb-2">
                                <h2 class="text-center">Nada para ver aqui...</h2>
                            </div>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('modals')
@include('dashboard.users._modals')
@endsection

@section('scripts')
@include('dashboard.users._scripts')
@endsection
