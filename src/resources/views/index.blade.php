@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<!-- メッセージ -->
@if(session('message'))
<div class="message">
    <div class="message__inner">
        {{session('message')}}
    </div>
</div>
@endif

<!-- エラーメッセージ -->
@error('content')
    <div class="form__error">
        <div class="form__error--inner">
            {{ $message }}
            @enderror
        </div>
    </div>

<!-- フォーム画面 -->
<div class="todo">
    <div class="todo__form">
        <form action="/todos" method="post" name="">
            @csrf
            <input class="todo__input" type="text" name="content" value="{{ old('content') }}">
            <button class=" todo__button" type="submit">作成</button>
        </form>
    </div>

    <!-- todo画面 -->
    <div class="todo__list">
        <h3 class="todo__list--title">Todo</h3>

        <ul class="todo__list--items">
            @foreach($todos as $todo)
            <li class="todo__list--item">
                <span class="todo__list-content">
                    {{ $todo->content }}
                </span>
                <div class="todo__actions">
                    <button class="todo__list--btn update">更新</button>
                    <button class="todo__list--btn delete">削除</button>
                </div>
            </li>
            @endforeach
        </ul>

    </div>

</div>
@endsection