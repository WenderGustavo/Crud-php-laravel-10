@extends('master')

@section('content')

<h2 class="mb-4">Criar Novo Usuário</h2>

@if (session()->has('message'))
    <div class="alert alert-info mb-3">
        {{ session()->get('message') }}
    </div>
@endif

<form action="{{ route('users.store') }}" method="post">
    @csrf

    <div class="form-group mb-3">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" placeholder="Seu nome" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', 'Maria') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Seu e-mail" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', 'maria@gmail.com') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" placeholder="Sua senha" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', '123') }}">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Criar Usuário</button>

    <!-- Botão para Voltar para a Lista de Usuários -->
    <a href="{{ url('/users') }}" class="btn btn-secondary ml-2">Voltar para a Lista</a>
</form>

@endsection
