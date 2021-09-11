@extends('layouts.master')

@section('content')
    <div class="flex justify-center items-center">
        <div class="w-4/5 mt-10 border bg-white shadow">
            <div class="bg-gray-700 p-2 flex items-center justify-between">
                <div class="flex justify-start items-center space-x-5">
                    <span class="text-2xl text-white font-light uppercase">Todo List</span>
                    @if((\App\Models\User::all()->where('id',session()->get('user_id'))->first())->roles()->where('name','Admin')->first())
                        <a href="{{ route('todo.create') }}"><span class="material-icons text-white cursor-pointer">add_circle</span></a>
                    @endif
                </div>
                <div>
                    <a href="{{ route('user.sing_out') }}"><span class="material-icons text-white cursor-pointer">logout</span></a>
                </div>
            </div>
            <div class="p-2">
                <table class="overflow-scroll w-full">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">SLNo</th>
                        <th class="py-3 px-6 text-left">Task</th>
                        <th class="py-3 px-6 text-left">Assign To</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    @foreach($todos as $todo)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">

                            <td class="py-3 px-6 text-left ">{{ $todo->id }}</td>
                            <td class="py-3 px-6 text-left ">{{ $todo->task }}</td>
                            <td class="py-3 px-6 text-left ">{{ $todo->user->first_name.' '.$todo->user->last_name  }}</td>
                            @if($todo->status=='P')
                                <td class="py-3 px-6 text-left ">Pending</td>
                            @elseif($todo->status=='C')
                                <td class="py-3 px-6 text-left ">Completed</td>
                            @else
                                <td class="py-3 px-6 text-left ">In Progress</td>
                            @endif
                            <td class="py-3 px-6 text-left ">
                                <div class="flex justify-center items-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <span class="material-icons cursor-pointer text-base">visibility</span>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <span class="material-icons cursor-pointer text-base">edit</span>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <span onclick="document.getElementById('d-u-{{ $todo->id }}').submit()" class="material-icons cursor-pointer text-base">delete_forever</span>
                                        <form action="{{ route('todo.destroy',$todo->id) }}" method="post" id="d-u-{{ $todo->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
