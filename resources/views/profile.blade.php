@extends('layouts.app')
@section('title', $user->username)
@section('content')
    <div class="flex flex-wrap items-center max-w-3xl mx-auto">
        <div class="w-full sm:w-6/12 p-5">
            <img class="w-[300px] mx-auto" src="{{asset('img/users/sin-foto.webp')}}" alt="">
        </div>
        <div class="w-full sm:w-6/12 text-center sm:text-start">
            <p class="text-gray-700">
                10 Seguidores 
            </p>
            <p class="text-gray-700">
                22 Siguiendo desde grondoy
            </p>
            <p class="text-gray-700">
                2 Publicaciones 
            </p>
        </div>
    </div>
    <div class="max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-700">Publicaciones</h2>
        <div class="flex flex-wrap">
            <div class="w-full sm:w-6/12 md:w-4/12 p-2">
                <img src="{{asset('img/posts/1.jpg')}}" alt="">
            </div>
            <div class="w-full sm:w-6/12 md:w-4/12 p-2">
                <img src="{{asset('img/posts/2.jpg')}}" alt="">
            </div>
            <div class="w-full sm:w-6/12 md:w-4/12 p-2">
                <img src="{{asset('img/posts/3.jpg')}}" alt="">
            </div>
            <div class="w-full sm:w-6/12 md:w-4/12 p-2">
                <img src="{{asset('img/posts/4.jpg')}}" alt="">
            </div>
            <div class="w-full sm:w-6/12 md:w-4/12 p-2">
                <img src="{{asset('img/posts/5.jpg')}}" alt="">
            </div>
            <div class="w-full sm:w-6/12 md:w-4/12 p-2">
                <img src="{{asset('img/posts/6.jpg')}}" alt="">
            </div>
        </div>
    </div>
@endsection