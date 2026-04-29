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
        <form action="/todos" method="post">
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
                <input type="text" class="todo__update--text" name="content" value="{{$todo->content}}">
    <!-- ボタン -->
                <div class="todo__btns">
                    <form action="/todos/update" method="post">
                        @csrf
                        <input type="hidden" class="todo__update" name="id" value="{{$todo->id}}">
                        <input type="hidden" class="todo__update--text" name="content" value="{{$todo->content}}">
                        <button class="todo__list--btn update btn" type="submit">更新</button>
                    </form>

                    <form action="/todos/destroy" method="post">
                        @csrf
                        <input type="hidden" class="todo__update" name="id" value="{{$todo->id}}">
                        <button class="todo__list--btn delete" type="submit">削除</button>
                    </form>
                </div>



            </li>
            @endforeach
        </ul>

    </div>

</div>
@endsection