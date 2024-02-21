@include('menu')



    <title>Lista de Clientes</title>

    <body>
    <div class="container">
        <h1>Lista de Clientes</h1>
        <table class="customer-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Nome Completo</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item['firstName'] }}</td>
                        <td>{{ $item['lastName'] }}</td>
                        <td>{{ $item['fullName'] }}</td>
                        <td>{{ $item['email'] }}</td>
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
