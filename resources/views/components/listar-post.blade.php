<div class="flex flex-col justify-center w-full items-center gap-12">
    @forelse ($posts as $post)
        <div>
            <div class="flex gap-3 items-center">
                <img 
                    class="w-8" 
                    src="{{asset('img/users/'.($post->user->imagen??'sin-foto.webp'))}}" alt="">
                <a href="{{route('profile.index',$post->user)}}">{{$post->user->username}}</a>
            </div>
            <div class="text-gray-700">
                {{$post->description}}
            </div>
            <a href="{{route('posts.show',[$post->user,$post])}}">
                <img src="{{asset('img/posts/'.$post->imagen)}}" alt="">
            </a>
            <span class="text-gray-400 text-xs">{{$post->created_at->diffForHumans()}}</span>
        </div>
    @empty
        
    @endforelse
</div>
<div class="my-10">
    {{$posts->links('pagination::tailwind')}}
</div>