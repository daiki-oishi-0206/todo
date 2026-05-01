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
    </div>
</div>
@enderror

<!-- 新規作成画面 -->
<div class="todo__contents">

    <div class="todo__new">
        <h3 class="todo__new--title">新規作成</h3>
        <form action="/todos" method="post">
            @csrf
            <input class="todo__input--todo" type="text" name="content" value="{{ old('content') }}">
            <select name="category_id" class="todo__input--category">
                <option value="">カテゴリ</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
            <button class=" todo__button" type="submit">作成</button>
        </form>
    </div>

    <!-- 検索画面 -->
    <div class="todo__search">
        <h3 class="todo__search--title">Todo検索</h3>
        <form action="/todos" method="post">
            @csrf
            <input class="todo__input--todo" type="text" name="content" value="{{ old('content') }}">
            <span class="todo__input--category">
                カテゴリ
            </span>
            <button class=" todo__button" type="submit">検索</button>
        </form>
    </div>

    <!-- todo画面 -->
    <div class="todo__list">
        <h3 class="todo__list--title">
            <span>Todo</span>
            <span>カテゴリ</span>
        </h3>

        <ul class="todo__list--items">
            @foreach($todos as $todo)
            <li class="todo__list--item">
                <div class="todo__row">
                    <input type="text" class="todo__list--task" name="content" value="{{$todo->content}}">
                    <input type="text" class="todo__list--category" value="{{$todo->category->name ?? ''}}">
                </div>

                <!-- ボタン -->
                <div class="todo__btns">
                    <form action="/todos/update" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$todo->id}}">
                        <input type="hidden" name="content" value="{{$todo->content}}">
                        <button class="todo__list--btn update btn" type="submit">更新</button>
                    </form>

                    <form action="/todos/destroy" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$todo->id}}">
                        <button class="todo__list--btn delete" type="submit">削除</button>
                    </form>
                </div>



            </li>
            @endforeach
        </ul>

    </div>

</div>
@endsection