@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div class="flex flex-col md:flex-row gap-8 items-center p-20">
        <div class="w-full md:w-3/5">
            <img class="w-full" src="{{ asset('img/registrar.jpg') }}" alt="">
        </div>
        <form 
            action="{{ route('register') }}"
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
            <label for="name">
                <span>Nombre</span>
                @error('name')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </label>
            <input type="text" name="name" id="name"
                value="{{ old('name') }}" 
                class="@error('name') !border-red-500 @enderror">
            <label for="username">
                <span>Username</span>
                @error('username')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </label>
            <input type="text" name="username" id="username"
                value="{{ old('username') }}" 
                class="@error('username') !border-red-500 @enderror">
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
            <label for="password_confirmation">
                <span>Confirmar Password</span>
                @error('password_confirmation')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="@error('password_confirmation') !border-red-500 @enderror">
            <button type="submit" class="bg-blue-500 text-white mt-5 rounded hover:bg-blue-800">Crear Cuenta</button>
        </form>
    </div>

@endsection