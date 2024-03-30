<?php

namespace App\Livewire;

use App\Models\Post;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class LikePost extends Component
{
    //laravel asigna automaticamente el :post con $this->post,
    public $post;
    public $isliked;
    public $likes;

    //mount sirve como constructor que se llamara cada vez que haya un render,
    //aqui tambien podriamos enviarle las variables
    public function mount(Post $post)
    {   
        $this->post=$post;
        auth()->user()
        ?$this->isliked=$this->post->checkLike(auth()->user())
        :$this->isliked=false;
        
        $this->likes=$this->post->likes->count();
    }
    public function like(){
        if(!$this->post->checkLike(auth()->user())){
            $this->post->likes()->create([
                'user_id'=>auth()->user()->id
            ]);
            $this->isliked=true;
            $this->likes++;
        }
    }
    public function dislike(){
        if($this->post->checkLike(auth()->user())){
            $this->post->likes()->where('user_id',auth()->user()->id)->delete();
            $this->isliked=false;
            $this->likes--;
        }
    }
    public function render()
    {
        return view('livewire.like-post');
    }
}
