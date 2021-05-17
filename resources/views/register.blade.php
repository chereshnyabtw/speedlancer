@extends('layouts.main')

@section('page_name', 'Регистрация')

@section('content')
<form method="POST" action="/register">
    @csrf
    @foreach ($errors as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="mb-3">
        <label for="usernameInput" class="form-label">Имя пользователя</label>
        <input type="text" class="form-control" name="username" id="usernameInput" required/>
    </div>
    <div class="mb-3">
        <label for="emailInput" class="form-label">Электронная почта</label>
        <input type="email" name="email" id="emailInput" class="form-control" required/>
    </div>
    <div class="mb-3">
        <label for="passwordInput" class="form-label">Пароль</label>
        <input type="password" name="password" id="passwordInput" class="form-control" required/>
    </div>
    <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
</form>
@endsection
