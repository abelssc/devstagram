<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommentPost extends Component
{
    public $post;
    #[Validate('required|max:255')]
    public $content;

    public function mount(Post $post){
        $this->post=$post;
    }
    public function save(){
        $this->validate(); 
        $this->post->comments()->create([
            'content'=>$this->content,
            'user_id'=>auth()->user()->id
        ]);
        $this->reset('content');
        $this->dispatch('listar-comments',["post"=>$this->post]);
        #esto sirve para retornar un aviso
        // session()->flash('status', 'Commentario subido exitosamente');
    }
    public function render()
    {
        return view('livewire.comment-post');
    }
}
