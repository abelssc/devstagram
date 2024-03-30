<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class ListarComments extends Component
{
    public $post;
    public $comments;

    #[On('listar-comments')]
    public function mount(Post $post){
        $this->post=$post;
        $this->comments=$post->comments;
    }
    public function delete(Comment $comment){
        if(auth()->user()->id===$comment->user_id || auth()->user()->id===$this->post->user_id){
            $comment->delete();
            $this->comments=$this->post->comments;
        }else{
            session()->flash('error', 'No puedes realizar esta acción');
        }
    }
    public function render()
    {
        return view('livewire.listar-comments');
    }
}
