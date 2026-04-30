<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function store(CategoryRequest $request){
        Category::create([
            'name' => $request->input('name')
        ]);
        return redirect('/categories') -> with('message', 'カテゴリを作成しました');
    }

    public function update(CategoryRequest $request){
        $category = Category::find($request->input('id'));
        $category->update([
            'name' => $request->input('name')
        ]);
        return redirect('/categories') -> with('message', '更新しました');
    }

    public function destroy(Request $request){
        $category = Category::find($request->input('id'));
        $category -> delete();
        return redirect('/categories') -> with('message', '削除しました');
    }

}
