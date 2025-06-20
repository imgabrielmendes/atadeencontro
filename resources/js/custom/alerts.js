function mostrarAlerta(titulo, mensagem, icone) {
    Swal.fire({
        title: titulo,
        text: mensagem,
        icon: icone
    });
}