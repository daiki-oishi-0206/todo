@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="todo">
    <!-- フォーム画面 -->
    <div class="todo_form">
        <form action="/" method="post">
            @csrf
            <input type="text" name="content">
            <button type="submit">作成</button>
        </form>
    </div>

    <!-- todo画面 -->
     <div class="todo-list">
        <h2 class="todo-list_title">Todo</h2>

        <ul class="todo-list_items">
                <li class="todo-list_item">
                    <span class="todo-list_content">
                        サンプルタスク
                    </span>

                    <button class="todo-list_btn update">更新</button>
                    <button class="todo-list_btn delete">削除</button>
                </li>
        </ul>
     </div>

</div>
@endsection