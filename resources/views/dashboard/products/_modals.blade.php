{{-- MODAL CREATE PRODUCT --}}
<div id="modalCreateProduct" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Registrar Produto</h4>
            </div>
            <form action="{{ route('dashboard.products.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Rádio" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="code">Código</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="e.g. 007" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price">Preço Unitário</label>
                            <input type="text" name="price" id="price" class="form-control mask-money" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL UPDATE PRODUCT --}}
<div id="modalUpdateProduct" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Atualizar Produto</h4>
            </div>
            <form action="{{ route('dashboard.products.update') }}" method="POST">
                @csrf
                @method("PUT")
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name_update" class="form-control" placeholder="e.g. Rádio">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="code">Código</label>
                            <input type="text" name="code" id="code_update" class="form-control" placeholder="e.g. 007">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price">Preço Unitário</label>
                            <input type="text" name="price" id="price_update" class="form-control mask-money">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL DELETE PRODUCTS --}}
<div id="modalDeleteProduct" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Excluir Produto</h4>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Você tem certeza que deseja <strong>excluir</strong> este produto?</h5>
                <span class="text-muted">Está operação não é reversível.</span>
            </div>
            <form action="{{ route('dashboard.products.destroy') }}" method="POST">
                @csrf
                @method("DELETE")
                <input type="hidden" name="id" id="id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Sim, Excluir!</button>
                </div>
            </form>
        </div>
    </div>
</div>
