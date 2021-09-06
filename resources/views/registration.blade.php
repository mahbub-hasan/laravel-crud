@extends('layouts.master')

@section('content')
    <div class="min-h-screen flex justify-center items-center">
        <div class="bg-white rounded shadow w-1/2">
            <div class="font-extralight m-3">
                <span class="text-3xl">Registration</span>
            </div>
            <form action="{{ route('user.sign_up') }}" method="post">
                @csrf
                <div class="m-3">
                    <div class="flex justify-between items-center space-x-4">
                        <div class="w-full">
                            <label for="first_name" class="uppercase block">first name</label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="appearance-none w-full rounded border shadow focus:outline-none p-2">
                            @error('first_name') <span id="first_name-error" class="font-extralight text-red-400 text-sm transition duration-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full">
                            <label for="last_name" class="uppercase block">last name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="appearance-none w-full rounded border shadow focus:outline-none p-2">
                            @error('last_name') <span id="last_name-error" class="font-extralight text-red-400 text-sm transition duration-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full mt-2">
                        <label for="username" class="uppercase block">username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}" class="appearance-none w-full rounded border shadow focus:outline-none p-2">
                        @error('username') <span id="username-error" class="font-extralight text-red-400 text-sm transition duration-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-between items-center space-x-4 mt-2">
                        <div class="w-full">
                            <label for="password" class="uppercase block">password</label>
                            <input type="password" name="password" id="password" value="{{ old('password') }}" class="appearance-none w-full rounded border shadow focus:outline-none p-2">
                            @error('password') <span id="password-error" class="font-extralight text-red-400 text-sm transition duration-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full">
                            <label for="c_password" class="uppercase block">confirm password</label>
                            <input type="password" name="c_password" id="c_password" value="{{ old('c_password') }}" class="appearance-none w-full rounded border shadow focus:outline-none p-2">
                            @error('c_password') <span id="c_password-error" class="font-extralight text-red-400 text-sm transition duration-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-2 space-x-4">
                        <div class="w-full">
                            <label for="gender" class="uppercase block">Gender</label>
                            <select class="appearance-none rounded border shadow w-full focus:outline-none p-2" id="gender" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="dob" class="uppercase block">Date of Birth</label>
                            <input type="date" name="dob" id="dob" class="appearance-none rounded border shadow focus:outline-none p-2 w-full">
                        </div>
                    </div>

                    <div class="flex justify-end items-center mt-3">
                        <button type="submit" class="appearance-none rounded border shadow bg-blue-700 text-blue-100 hover:bg-blue-900 hover:text-blue-100 p-2">
                            <span>Registration</span>
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
