@extends('layout.app', ["current" => "produtos" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Produtos</h5>

        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                    
            </tbody>
        </table>     
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" role="button" >Novo produto</button>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
        <div class="modal-dialog" role="documment">
            <div class="modal-content">
                <form action="" class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5>Novo Produto</h5>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="nomeProduto" class="control-label">Nome do produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do produto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precoProduto" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="precoProduto" placeholder="Preço do produto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="qtdeProduto" class="control-label">Quantidade do produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="qtdeProduto" placeholder="Quantidade do produto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nomeProduto" class="control-label">Nome do produto</label>
                            <div class="input-group">
                                <select class="form-control" id="deptoProduto">

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dissmiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection