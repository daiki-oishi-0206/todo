@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/category.css')}}">
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
@error('name')
<div class="form__error">
    <div class="form__error--inner">
        {{ $message }}
    </div>
</div>
@enderror

<!-- 入力画面 -->
<div class="todo__contents">

    <div class="todo__new">
        <form action="/categories" method="post">
            @csrf
            <input class="todo__input--todo" type="text" name="name" value="{{ old('name') }}">
            <button class=" todo__button" type="submit">作成</button>
        </form>
    </div>


    <!-- todo画面 -->
    <div class="todo__list">
        <h3 class="todo__list--title">
            <span>category</span>
        </h3>

        <ul class="todo__list--items">
            @foreach($categories as $category)
            <li class="todo__list--item">
                <div class="todo__row">
                    <input type="text" class="todo__list--task" name="name" value="{{$category->name}}"
                    form = "form-{{$category->id}}">
                </div>

                <!-- ボタン -->
                <div class="todo__btns">
                    <form action="/categories/update" method="post" id = "form-{{$category->id}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <button class="todo__list--btn update btn" type="submit">更新</button>
                    </form>

                    <form action="/categories/delete" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <button class="todo__list--btn delete" type="submit">削除</button>
                    </form>
                </div>



            </li>
            @endforeach
        </ul>

    </div>

</div>
@endsection