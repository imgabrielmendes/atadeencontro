document.addEventListener("DOMContentLoaded", function() {
    var btnfinalizar = document.getElementById("btnfinalizar");
    btnfinalizar.addEventListener('click', function() {
        finalizarata();
    });

    function finalizarata() {

        var urlParts = window.location.pathname.split('/');
        var ataId = urlParts[urlParts.length - 1];

        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // $.ajax({
        //     url: '/finalizarAta',
        //     method: 'POST',
        //     data: {
        //         id_ata: ataId, 
        //         _token: token
        //     },
        //     success: function(response) {
        //         console.log(response);
        //     },
        //     error: function(xhr, status, error) {
        //         console.error('Erro na solicitação AJAX:', error);
        //         console.error('Response:', xhr.responseText);
        //     }
        // });
    }
});
