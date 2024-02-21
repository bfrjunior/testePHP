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
            @if(isset($data) && count($data) > 0)
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

                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($currentPage > 1)
        <a href="{{ route('pedidos.index', ['page' => $currentPage - 1]) }}">Página Anterior</a>
    @endif

    @if($currentPage < $lastPage)
        <a href="{{ route('pedidos.index', ['page' => $currentPage + 1]) }}">Próxima Página</a>
    @endif
@else
    <p>Nenhum cliente encontrado.</p>
@endif
    </div>
</body>
</html>