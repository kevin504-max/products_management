@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Detalhes do Usuário
                        <a href="{{ route('dashboard.users.index') }}" class="btn btn-primary float-end">Gestão de Usuários</a>
                    </h1>
                    <div class="col-lg-12 hr-line"></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="name">Nome</label>
                            <div class="p-2 border">{{ $user->name }}</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="email">E-mail</label>
                            <div class="p-2 border">{{ $user->email }}</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for="cpf">CPF</label>
                            <div class="p-2 border">{{ $user->cpf }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
