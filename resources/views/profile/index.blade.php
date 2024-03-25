@extends('layouts.app')
@section('title', $user->username)
@section('content')
    <div class="flex flex-wrap items-center max-w-3xl mx-auto">
        <div class="w-full sm:w-6/12 p-5 flex flex-col">
            <img class="w-[300px] mx-auto rounded-[50%]" src="{{asset('img/users/'.($user->imagen??'sin-foto.webp'))}}" alt="">
            @auth
                @if(auth()->user()->id===$user->id)
                    <a href="{{route('profile.edit',$user)}}" class="inline-block ml-auto">
                        <svg class="inline-block w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                @endif
            @endauth
        </div>
        <div class="w-full sm:w-6/12 text-center sm:text-start">
            <p class="text-gray-700">
                <span>{{$user->followers->count()}} @choice('seguidor|seguidores',$user->followers->count()) </span>
            </p>
            <p class="text-gray-700">
                {{$user->followings->count()}} Siguiendo
            </p>
            <p class="text-gray-700">
                {{$posts->count()}} Publicaciones 
            </p>
            @auth
                @if(auth()->user()->id!==$user->id)
                    @if (!$user->siguiendo(auth()->user()))
                        <form class="inline-block" action="{{route('follow.store',$user)}}" method="POST">
                            @csrf
                            <button class="px-2 py-1 rounded bg-blue-400 hover:bg-blue-600 text-white text-xs" type="submit">SEGUIR</button>
                        </form>
                    @else
                        <form class="inline-block" action="{{route('follow.destroy',$user)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="px-2 py-1 rounded bg-red-400 hover:bg-red-600 text-white text-xs" type="submit">DEJAR DE SEGUIR</button>
                        </form>
                    @endif
                @endif
            @endauth
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