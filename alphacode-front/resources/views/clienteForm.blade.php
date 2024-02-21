@include('menu')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Cliente</div>

                <div class="card-body">
                    <form action="{{ route('users.update', $cliente['id']) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="firstName">Primeiro Nome</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $cliente['firstName'] }}">
                        </div>

                        <div class="form-group">
                            <label for="lastName">Último Nome</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $cliente['lastName'] }}">
                        </div>

                        <div class="form-group">
                            <label for="fullName">Nome Completo</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" value="{{ $cliente['fullName'] }}">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $cliente['email'] }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

