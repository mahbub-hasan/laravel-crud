@extends('layouts.master')

@section('content')
    <div class="flex justify-center items-center">
        <div class="w-4/5 mt-10 border bg-white shadow">
            <div class="bg-gray-700 p-2 flex justify-start items-center space-x-5 space-y-1">
                <a href="{{ route('todo.index') }}"><span class="material-icons text-white cursor-pointer">arrow_back</span></a>
                <label><span class="text-2xl text-white font-light uppercase">Add Todo</span></label>
            </div>
            <form action="{{ route('todo.store') }}" method="post">
                @csrf
                <div class="mt-3 p-2">
                    <div class="w-full">
                        <label for="task" class="text-sm font-light uppercase block">Task</label>
                        <input type="text" name="task" id="task" value="{{ old('task') }}" class="appearance-none rounded border p-2 focus:outline-none w-full">
                        @error('task') <span id="task-error" class="font-extralight text-red-400 text-sm transition duration-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-full mt-2">
                        <label for="task_details" class="text-sm font-light uppercase block">Details</label>
                        <textarea cols="10" rows="5" name="task_details" id="task_details" class="appearance-none rounded border p-2 focus:outline-none w-full">
                        </textarea>
                        @error('task_details') <span id="task_details-error" class="font-extralight text-red-400 text-sm transition duration-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-full mt-3">
                        <label class="text-sm font-light uppercase block">Assign To</label>
                        <select class="appearance-none rounded border p-2 w-full focus:outline-none" name="assign_to" id="assign_to">
                            <option value="0" disabled selected>Choose assigned person</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}</option>
                            @endforeach
                        </select>
                        @error('assign_to') <span id="assign_to-error" class="font-extralight text-red-400 text-sm transition duration-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-center items-center mt-5">
                        <button type="submit" class="appearance-none rounded border p-2 bg-blue-700 text-blue-100 hover:bg-blue-900 hover:text-white w-1/3">
                            Store
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
