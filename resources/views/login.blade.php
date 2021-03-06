@extends('layouts.main')

@section('page_name', __('site_names.authorize'))

@section('content')
<form method="POST" action="/login">
    @csrf
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
    <div class="row justify-content-md-center">
        <div class="col-md-3">
            <div class="mb-3">
                <label for="usernameInput" class="form-label">{{__('validation.attributes.username')}}</label>
                <input type="text" class="form-control" name="username" id="usernameInput" required/>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">{{__('validation.attributes.password')}}</label>
                <input type="password" name="password" id="passwordInput" class="form-control" required/>
            </div>
            <div class="d-grid gap-2 col-md-12 mx-auto">
                <button class="btn btn-primary" type="submit">{{__('site_names.authorize')}}</button>
            </div>
        </div>
    </div>
</form>
@endsection
