<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    public function store(TodoRequest $request)
    {
        Todo::create([
            'content' => $request->input('content')
        ]);
        return redirect('/') -> with('message', 'Todoを作成しました');
    }
}
