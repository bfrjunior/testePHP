@include('menu')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Pedido</div>

                <div class="card-body">
                    <form action="{{ route('pedidos.update', $pedido['id']) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="payment">Status</label>
                            <input type="text" class="form-control" id="payment" name="payment" value="{{ $pedido['payment'] }}">
                        </div>


                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

