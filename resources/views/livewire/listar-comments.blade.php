<div class="flex flex-col gap-4 px-4 h-full">
    @forelse ($comments as $comment) 
    <div>
        <div class="flex gap-3 items-center">
            <img class="w-8" src="{{asset('img/users/sin-foto.webp')}}" alt="">
            <a href="{{route('profile.index',$comment->user)}}">{{$comment->user->username}}</a>
            <span class="text-gray-400 text-xs">{{$comment->created_at->diffForHumans()}}</span>
            @auth
                @if(auth()->user()->id===$comment->user_id || auth()->user()->id===$post->user_id)
                <form 
                    class="ml-auto" 
                    wire:submit='delete({{$comment->id}})'>
                    <button type="submit" class="w-3 h-3">
                        <svg class="fill-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                </form>
                @endif
            @endauth
        </div>
        <div class="text-gray-700">
            {{$comment->content}}
        </div>
    </div>
    @empty
    <div class="text-gray-400 text-xs">
        No hay comentarios
    </div>
    @endforelse
    @session('error')
        <div class="bg-red-500 text-white p-1 rounded">
            {{ session('error') }}
        </div>
    @endsession
</div>