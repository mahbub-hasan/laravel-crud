@extends('layouts.master')

@section('content')
    <div class="min-h-screen flex justify-center items-center">
        <div class="bg-white rounded shadow w-1/2">
            <div class="font-extralight m-3">
                <span class="text-3xl">Login</span>
            </div>
            <form action="{{ route('user.sign_in') }}" method="post">
                @csrf
                <div class="m-3">

                    <div class="w-full mt-2">
                        <label for="username" class="uppercase block">username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}" class="appearance-none w-full rounded border shadow focus:outline-none p-2">
                        @error('username') <span id="username-error" class="font-extralight text-red-400 text-sm transition duration-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-full mt-2">
                        <label for="password" class="uppercase block">password</label>
                        <input type="password" name="password" id="password" value="{{ old('password') }}" class="appearance-none w-full rounded border shadow focus:outline-none p-2">
                        @error('password') <span id="password-error" class="font-extralight text-red-400 text-sm transition duration-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-center items-center mt-3">
                        <button type="submit" class="appearance-none rounded border shadow bg-blue-700 text-blue-100 hover:bg-blue-900 hover:text-blue-100 p-2 w-1/2">
                            <span>Login</span>
                        </button>
                    </div>

                    <div class="flex justify-center items-center mt-3">
                        <label class="font-light">
                            <span class="uppercase text-sm">Forget Password?</span>
                            <span> | </span>
                            <a href="{{ route('user.registration') }}" class="uppercase text-blue-700 text-sm">
                                <span>Create a new account</span>
                            </a>
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
