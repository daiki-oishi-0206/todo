<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Models\Category;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }

    public function store(TodoRequest $request)
    {
        Todo::create([
            'content' => $request->input('content'),
        ]);
        return redirect('/') -> with('message', 'Todoを作成しました');
    }

    public function update(TodoRequest $request){
        $todo = Todo::find($request->input('id'));
        $todo->update([
            'content'=>$request->input('content')
        ]);
        return redirect('/')->with('message', '更新しました');

    }

    public function destroy(Request $request){
        $todo = Todo::find($request->input('id'))-> delete();
        return redirect('/')->with('message', '削除しました');

    }
}
