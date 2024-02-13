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
                {{$posts->count()}} Publicaciones 
            </p>
        </div>
    </div>
    <div class="max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-700 mb-8">Publicaciones</h2>
        <div class="flex flex-wrap">
            @forelse ($posts as $post)
                <div class="w-full sm:w-6/12 md:w-4/12 p-2">
                    <a href="{{route('posts.show',['user'=>$user,'post'=>$post])}}">
                        <img src="{{asset('img/posts/'.$post->imagen)}}" alt="">
                    </a>
                </div>
            @empty
                <p class="text-gray-700 w-full text-center">No hay publicaciones</p>
            @endforelse            
        </div>
        {{-- paginacion con taildwind y blade --}}
        <div>
            {{-- forma 1 --}}
            {{$posts->links('pagination::tailwind')}}
            {{-- forma 2 --}}
            <!-- {{($user->posts()->paginate(20))->links('pagination::tailwind')}} -->
        </div>
    </div>
@endsection