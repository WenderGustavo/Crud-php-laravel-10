@extends('master')

@section('content')

<!-- Título da Página -->
<h2 class="mb-4">Editar Usuário</h2>

<!-- Mensagem de Sucesso ou Erro -->
@if (session()->has('message'))
    <div class="alert alert-info mb-3">
        {{ session()->get('message') }}
    </div>
@endif

<!-- Formulário de Edição -->
<form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">

    <!-- Campo Nome -->
    <div class="form-group mb-3">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo E-mail -->
    <div class="form-group mb-3">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Botão de Atualização -->
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection
