<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    //追加
    public function index() {
        $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);
    }
    public function store(Request $request) {
        $todo = new Todo();
        $todo->body = $request->body;
        $todo->save();
        return redirect('/');
    }
    public function destroy(todo $todo) {
        $todo->delete();
        return redirect('/');
    }
    public function edit(todo $todo) {
        return view('todos.edit')->with('todo',$todo);
    }
    public function update(Request $request,todo $todo) {
        $todo->body = $request->body;
        $todo->save();
        return redirect('/');
    }
    public function post(Request $request)
    {
        $validate_rule = [
            'name' => 'size:20',
        ];
        $this->validate($request, $validate_rule);
        return view('index', ['txt' => '正しい入力です']);
    }
    //追加
}
