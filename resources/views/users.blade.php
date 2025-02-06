@extends('master')

@section('content')

<hr>    

<!-- Tabela de usuários -->
<div class="d-flex justify-content-between mb-3">
    <h3>Usuários</h3>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Criar Usuário</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <!-- Botões de Ação (Mostrar, Editar) -->
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-info btn-sm">Mostrar</a>
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Botão para Voltar para Home -->
<a href="{{ url('/') }}" class="btn btn-success mt-3">Voltar para Home</a>

@endsection
