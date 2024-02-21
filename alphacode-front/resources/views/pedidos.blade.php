@include('menu')

<title>Lista de Pedidos</title>

    <body>
    <div class="container">
        <h1>Lista de Pedidos</h1>
        <table class="customer-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>email</th>
                    <th>Tipo de pagamento</th>
                    <th>Valor</th>
                    <th>Status</th>
                     <th>Data</th>
                     <th>Pagamento Desde</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>

                    <td>{{ $item['user']['fullName'] }}</td>
                    <td>{{ $item['user']['email'] }}</td>
                    <td>{{ $item['type'] }}</td>
                    <td>{{ $item['value'] }}</td>
                    <td>{{ $item['payment'] }}</td>
                    <td>{{ $item['paymentDate'] }}</td>
                    <td>{{ $item['paymentSince'] }}</td>

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