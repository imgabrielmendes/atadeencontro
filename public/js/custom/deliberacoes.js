function mostrarAlerta(titulo, mensagem, icone) {
    Swal.fire({
        title: titulo,
        text: mensagem,
        icon: icone
    });
}

document.addEventListener("DOMContentLoaded", function() {
    var btndeliberacao = document.getElementById("addItemButton");
    btndeliberacao.addEventListener('click', function() {
        registrarDeliberacao();
    });

    function registrarDeliberacao() {
        var selectedOptions = new Set();
        document.querySelectorAll("#options-container .cursor-pointer").forEach(function(optionElement) {
            if (optionElement.classList.contains('bg-gray-100')) {
                selectedOptions.add(optionElement.dataset.id);
            }
        });
    
        var urlParts = window.location.pathname.split('/');
        var ataId = urlParts[urlParts.length - 1];
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var deliberacao = document.getElementById("deliberacoes").value;

        if (!deliberacao.trim()) {
            mostrarAlerta("Erro", "Você deve preencher a deliberação antes de enviar.", "error");
            return;
        }
    
        $.ajax({
            url: '/registrardeliberacao',
            method: 'POST',
            data: {
                participantes: Array.from(selectedOptions),
                deliberacao: deliberacao,
                id_ata: ataId,
                _token: token
            },
            success: function(response) {
                if (response.success) {
                    mostrarAlerta("Ata registrada!", "Sua ata foi devidamente atribuída", "success");
                    
                    document.getElementById("deliberacoes").value = "";
    
                    const container = document.getElementById("deliberacoes-container");
    
                    const newItem = `
                        <div class="col-md-6 mb-2" id="deliberacao-${response.id}">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="card-body clearfix">
                                        <div class="media align-items-stretch">
                                            <div class="text-start media-body align-self-center">
                                                <h4 class="text-primary">Deliberação:</h4>
                                                <p class="mb-2">${response.deliberacao}</p>
    
                                                <h4 class="text-secondary">Deliberados:</h4>
                                                <ul class="list-unstyled">
                                                    ${response.users.map(user => `<li><i class="icon-user success"></i> ${user.name}</li>`).join('')}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
    
                    container.insertAdjacentHTML("afterbegin", newItem);
                }
            },
            error: function(xhr, status, error) {
                mostrarAlerta("Problema!", "Você não informou um texto principal", "error");
                console.error('Erro na solicitação AJAX:', error);
                console.error('Response:', xhr.responseText);
            }
        });
    }
});
