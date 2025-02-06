@extends('master')

@section('content')

<!-- Título da Página -->
<h2 class="mb-4">Detalhes do Usuário - {{ $user->name }}</h2>

<!-- Exibição dos detalhes do usuário -->
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Nome: {{ $user->name }}</h5>
        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
        <p class="card-text"><strong>Data de Criação:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
    </div>
</div>

<!-- Formulário para exclusão de usuário -->
<form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-danger">Excluir Usuário</button>
</form>

@endsection
