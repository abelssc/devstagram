import Dropzone from "dropzone";

if(document.querySelector("#dropzone")){
    const dropzone = new Dropzone("#dropzone",{
        dictDefaultMessage: "Sube tu imagen aquí",
        acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg,.webp",
        maxFiles: 1,
        addRemoveLinks: true,
        uploadMultiple: false,
    
    
        init: function(){
            if(document.querySelector("[name='imagen']").value.trim()){
                let imagenPublicada = {};
                imagenPublicada.size = 1234;
                imagenPublicada.name = document.querySelector("[name='imagen']").value;
    
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada, `/img/posts/${imagenPublicada.name}`);
                imagenPublicada.previewElement.classList.add('dz-success');
                imagenPublicada.previewElement.classList.add('dz-complete');
            }
        }
    });
    
    dropzone.on("success", (file,response) => {
        document.querySelector("[name='imagen']").value = response.imagen;
    });
    dropzone.on("removedfile", (file) => {
        document.querySelector("[name='imagen']").value = "";
        // if(file.status != "error"){
        //     let params = new URLSearchParams();
        //     params.append('imagen', file.name);
        //     axios.post('/posts/eliminarimagen', params);
        // }
    }
    );
}