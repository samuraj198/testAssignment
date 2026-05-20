@extends('layouts.main')

@section('title', 'Регистрация')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <a href="{{route('dashboard')}}">На главную</a>
    @endif
    <form style="display: flex; flex-direction: column; gap: 30px" action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Введите имя">
        <input type="text" name="email" placeholder="Введите почту">
        <input type="password" name="password" placeholder="Введите пароль">
        <input type="password" name="password_confirmation" placeholder="Повторите пароль">
        <button type="submit">Регистрация</button>
    </form>
    <a style="margin: 20px" href="{{ route('register') }}">Авторизация</a>
    <div style="color: red;" class="errors">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
    </div>
@endsection
