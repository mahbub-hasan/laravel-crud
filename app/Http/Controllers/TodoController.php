<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoAddRequest;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $users = User::all()->whereNotIn('id',session()->get('user_id'));
        return view('todos.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TodoAddRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TodoAddRequest $request)
    {
        Todo::create([
            'task'=>$request->input('task'),
            'task_details'=>$request->input('task_details'),
            'user_id'=>$request->input('assign_to')
        ]);
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back();
    }
}
