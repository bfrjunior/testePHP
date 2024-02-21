@include('menu')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Produto</div>

                <div class="card-body">
                <form action="{{ route('produtos.update', ['id' => $produto['id'], 'user_id' => $produto['user']['user_id']]) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $produto['descricao'] }}">
                        </div>

                        <div class="form-group">
                            <label for="valor_unitario">Valor</label>
                            <input type="text" class="form-control" id="valor_unitario" name="valor_unitario" value="{{ $produto['valor_unitario'] }}">
                        </div>

                        <div class="form-group">
                            <label for="desconto">Desconto</label>
                            <input type="text" class="form-control" id="desconto" name="desconto" value="{{ $produto['desconto'] }}">
                        </div>

                        <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="text" class="form-control" id="quantidade" name="quantidade" value="{{ $produto['quantidade'] }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

