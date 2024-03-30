<div>
    <form
        wire:submit='save'
        class="flex gap-3 items-center"
    >
        <img class="w-8" src="{{asset('img/users/sin-foto.webp')}}" alt="">
        <textarea 
            wire:model='content'
            placeholder="Añade un comentario"
            name="content" id="content"
            class="w-full border-none focus:outline-none bg-transparent"></textarea>
      
        <button class="text-blue-400" type="submit">
            Publicar
        </button>
    </form>

    @error('content')
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>
