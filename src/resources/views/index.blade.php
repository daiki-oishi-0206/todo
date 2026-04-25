@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="todo">
    <!-- フォーム画面 -->
    <div class="todo__form">
        <form action="/" method="post">
            @csrf
            <input class="todo__input" type="text" name="content">
            <button class="todo__button" type="submit">作成</button>
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