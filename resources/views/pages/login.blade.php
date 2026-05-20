@extends('layouts.main')

@section('title', 'Авторизация')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <a href="{{route('dashboard')}}">На главную</a>
    @endif
    <form style="display: flex; flex-direction: column; gap: 30px" action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Введите почту">
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit">Авторизация</button>
    </form>
    <a style="margin: 20px" href="{{ route('register') }}">Регистрация</a>
    <div style="color: red;" class="errors">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
    </div>
@endsection
