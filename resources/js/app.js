import Dropzone from "dropzone";

const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage: "Sube tu imagen aquí",
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg,.webp",
    maxFiles: 1,
    addRemoveLinks: true,
    uploadMultiple: false
});

dropzone.on("addedfile", file => {
    console.log(`File added: ${file.name}`);
});