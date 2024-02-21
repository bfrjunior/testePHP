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
            @if(isset($data) && count($data) > 0)
            <tbody>
            
                @foreach($data as $item)
                    <tr>

                        
                        <td>{{ $item['descricao'] }}</td>
                        <td>{{ $item['valor_unitario'] }}</td>
                        <td>{{ $item['desconto'] }}</td>
                        <td>{{ $item['quantidade'] }}</td>
   
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($currentPage > 1)
        <a href="{{ route('produtos.index', ['page' => $currentPage - 1]) }}">Página Anterior</a>
    @endif

    @if($currentPage < $lastPage)
        <a href="{{ route('produtos.index', ['page' => $currentPage + 1]) }}">Próxima Página</a>
    @endif
@else
    <p>Nenhum cliente encontrado.</p>
@endif
    </div>
</body>
</html>