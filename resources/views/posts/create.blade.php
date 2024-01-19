@extends('layouts.app')
@section('title', 'Crear Post')

@section('content')
    <div class="flex flex-col md:flex-row gap-8 my-8">
        <form action="/any" method="POST" id="dropzone" class="dropzone w-full md:w-6/12 min-h-60 bg-white p-8 flex justify-center items-center border-4 border-dotted text-gray-400">
        </form>
        <div class="w-full md:w-6/12">
            <form 
            action=""
            method="POST"
            class="w-full
                bg-white
                p-8
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
            <label for="titulo">
                <span>Titulo</span>
                @error('titulo')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </label>
            <input type="titulo" name="titulo" id="titulo" 
                value="{{ old('titulo') }}"
                class="@error('titulo') !border-red-500 @enderror">
            <label for="description">
                <span>Descripción</span>
                @error('description')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </label>
            <input type="description" name="description" id="description" class="@error('description') !border-red-500 @enderror">
            <button type="submit" class="bg-blue-500 text-white mt-5 rounded hover:bg-blue-800">Crear Publicación</button>
        </form>
        </div>
    </div>
@endsection