@extends('layouts.app')
@section('title', 'Editar Perfil')

@section('content')
    <div class="flex flex-col md:flex-row gap-8 items-center p-20 max-w-5xl mx-auto">
        <label for="imagen" class="w-full md:w-3/6">
            <img class="w-full" src="{{ asset('img/users/'.($user->imagen??'sin-foto.webp')) }}" alt="">
        </label>
        <form 
            action="{{route('profile.update',$user)}}"
            method="POST"
            enctype="multipart/form-data"
            class="w-full md:w-3/6
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
            @method("PUT")
            <label for="name">
                <span>Nombre</span>
                @error('name')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </label>
            <input type="text" name="name" id="name"
                value="{{ $user->name }}" 
                class="@error('name') !border-red-500 @enderror">
            <label for="username">
                <span>Username</span>
                @error('username')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </label>
            <input type="text" name="username" id="username"
                value="{{ $user->username }}" 
                class="@error('username') !border-red-500 @enderror">
            <input type="file" name="imagen" id="imagen" class="hidden" value="" accept="image/*">
            <button type="submit" class="bg-blue-500 text-white mt-5 rounded hover:bg-blue-800">Editar perfil</button>
        </form>
    </div>

@endsection