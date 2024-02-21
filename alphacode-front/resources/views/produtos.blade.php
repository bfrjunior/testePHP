@include('menu')

<title>Lista de Produtos</title>

    <body>
    <div class="container">
        <h1>Lista de Produtos</h1>
        <table class="customer-table">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Desconto</th>
                    <th>Quantidade Estoque</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item['descricao'] }}</td>
                        <td>{{ $item['valor_unitario'] }}</td>
                        <td>{{ $item['desconto'] }}</td>
                        <td>{{ $item['quantidade'] }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>