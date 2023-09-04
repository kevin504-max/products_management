@extends('layouts.app' )

@section('content')
<div class="container">

    <a class="btn btn-outline-secondary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    <i class="fa fa-bars"></i>
    </a>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Dashboard</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <div class="mb-3">
                <strong>Dashboard de Gerenciamento de Conteúdo</strong>
            </div>

            <div>
                <ul class="nav flex-column" style="font-size: 1.2rem;">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-secondary"><i class="fa fa-user"></i> Clientes</a>
                    </li>
                    <li class="nav-item mb-2 ">
                        <a href="#" class="nav-link text-secondary"><i class="fa fa-box"></i> Produtos</a>
                    </li>
                    <li class="nav-item mb-2 ">
                        <a href="#" class="nav-link text-secondary"><i class="fa fa-dollar"></i> Compras</a>
                    </li>
                </ul>
            </div>

        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        <h1>
            Bem vindo ao Dashboard de Gerenciamento de Conteúdo
        </h1>
    </div>

</div>
@endsection
