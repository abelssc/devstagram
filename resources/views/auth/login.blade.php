@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="flex flex-col md:flex-row gap-8 items-center p-20">
        <div class="w-full md:w-3/5">
            <img class="w-full" src="{{ asset('img/login.jpg') }}" alt="">
        </div>
      
        <form 
            action="{{ route('login') }}"
            method="POST"
            class="w-full md:w-2/5
                bg-white
                p-5 
                text-gray-500 
                flex 
                flex-col
                [&>label]:before:content-['*']
                [&>label]:before:text-red-500
                [&>label]:before:mr-1
                [&>label>span]:uppercase 
                [&>label>span]:font-bold
                [&>input]:border
                [&>input]:border-gray-200
                [&>input]:rounded
                [&>input]:mb-5
                [&>*]:p-1"
            >
            @csrf
            @session('status')
                <div class="bg-red-500 text-white p-5 rounded">
                    {{ session('status') }}
                </div>
            @endsession
            <label for="email">
                <span>Email</span>
                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </label>
            <input type="email" name="email" id="email" 
                value="{{ old('email') }}"
                class="@error('email') !border-red-500 @enderror">
            <label for="password">
                <span>Password</span>
                @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </label>
            <input type="password" name="password" id="password" class="@error('password') !border-red-500 @enderror">
            <label>
                <input type="checkbox" name="remember" id="remember">
                <span>Recuerdame</span>
            </label>
            <button type="submit" class="bg-blue-500 text-white mt-5 rounded hover:bg-blue-800">Crear Cuenta</button>
        </form>
    </div>

@endsection