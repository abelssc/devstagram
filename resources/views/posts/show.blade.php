@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="flex flex-wrap max-w-5xl mx-auto text-sm">
        <div class="w-full sm:w-6/12 md:w-8/12">
            <img class="w-full" src="{{asset('img/posts/'.$post->imagen)}}" alt="">
        </div>
        <div class="w-full sm:w-6/12 md:w-4/12 flex flex-col gap-4 h-full bg-white shadow max-h-[600px] overflow-y-scroll">
            <div class="sticky top-0 bg-white p-4 shadow-sm">
                <div class="flex gap-3 items-center">
                    <img class="w-8" src="{{asset('img/users/sin-foto.webp')}}" alt="">
                    <a href="{{route('profile.index',$user)}}">{{$user->username}}</a>
                    <span class="text-blue-700">Seguir</span>
                  
                    @auth
                        @if($post->user_id===auth()->user()->id)
                        <form class="ml-auto" action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method("delete")
                            <button type="submit" class="w-3 h-3">
                                <svg class="fill-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                            </button>
                        </form>
                        @endif
                    @endauth
                </div>
                <div class="text-gray-700">
                    {{$post->description}}
                </div>
            </div>
          
            <livewire:listar-comments :$post/>
            <div class="sticky bottom-0 bg-white p-4 border-t border-t-gray-50">
                <livewire:like-post :$post/>
                @auth
                <livewire:comment-post :$post/>
                @endauth
                @guest
                <div class="text-gray-400 text-xs">
                    <a href="{{route('login')}}" class="text-blue-400">Inicia sesi&oacute;n</a> para comentar
                </div>
                @endguest
            </div>

        </div>

    </div>
@endsection