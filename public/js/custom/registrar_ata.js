
//1° LINHAS
var data = document.getElementById("datainicio").value;
var horainicio = document.getElementById("horainicio").value;
var horaterm = document.getElementById("horaterm").value;

// 2° LINHAS
var objetivomarc = document.getElementsByName("objetivo");
var objetivoSelecionado = null;

//3° LINHA
var temaprincipal = document.getElementById("temaprincipal");

var gravarinformacoes = document.getElementById("botaoregistrar");
gravarinformacoes.addEventListener('click', gravando);
function gravando() {

    var data = document.getElementById("datainicio").value;
    var horainicio = document.getElementById("horainicio").value;
    var horaterm = document.getElementById("horaterm").value;

    var objetivomarc = document.getElementsByName("objetivo");
    var objetivoSelecionado = null;

    for (var op = 0; op < objetivomarc.length; op++) {
        if (objetivomarc[op].checked) {
            objetivoSelecionado = objetivomarc[op].value;
            break;
        }
    }

    var local = document.getElementById("pegarlocal").value;
    // var facilitadores = document.getElementById("selecionandofacilitador").value;
    var temaprincipal = document.getElementById("temaprincipal");

    var conteudo = temaprincipal.value;
    var data = document.getElementById("datainicio").value;

    
    if (data.trim() === "" || horainicio.trim() ==="" || objetivoSelecionado.trim() === "" || conteudo.trim() === "" ||
    facilitadoresSelecionados.length === 0 || facilitadoresSelecionadosLabel.length === 0) { 

        Swal.fire({
            title: "Erro no registro",
            text: "Preencha todas as caixas obrigatórias",
            icon: "error"
        });

        console.log("(X) Puxou a function, mas está faltando informações");

        // console.log(objetivoSelecionado);
        // console.log(local);
        // console.log(facilitadores);
    } 

    else if (horaterm !== ""  && horainicio > horaterm) {
        Swal.fire({
            title: "Horário incorreto",
            icon: "error"
        });
    }

    else {

        Swal.fire({
            title: "Ata registrada com sucesso!",
            icon: "success"
        });
    

    console.log("(1) A função 'gravando()' foi chamada");

    // Primeira solicitação AJAX para enviarprobanco.php
    $.ajax({
        url: 'enviarprobanco.php',
        method: 'POST',
        data: {
            facilitadores: JSON.stringify(facilitadoresSelecionados),
            texto: conteudo,
            horai: horainicio,
            horat: horaterm,
            datainic: data,
            objetivos: objetivoSelecionado,
            local: local,
        },
        
        success: function () {
            console.log("(2) Deu bom! AJAX está enviando");

            setTimeout(function() {
                window.location.href = 'pagparticipantes.php' +
                '?facilitadores=' + encodeURIComponent(JSON.stringify(facilitadoresSelecionadosLabel)) +
                '&conteudo=' + encodeURIComponent(conteudo) +
                '&horainicio=' + encodeURIComponent(horainicio) +
                '&horaterm=' + encodeURIComponent(horaterm) +
                '&data=' + encodeURIComponent(data) +
                '&objetivoSelecionado=' + encodeURIComponent(objetivoSelecionado) +
                '&local=' + encodeURIComponent(local);
                
            }, 1500);
        },

        error: function (error) {
            console.error('Erro na solicitação AJAX:', error);
        },
    });
}}

///------------BOTÃO DE REGISTRAR EMAIL DENTRO DA MODAL------------------------------

var botaoemail = document.getElementById("registraremail");
botaoemail.addEventListener('click', gravaremail);

function gravaremail(){

    var caixadenome = document.getElementById("caixanome").value;
    var caixadeemail = document.getElementById("caixadeemail").value;
    var caixamatricula = document.getElementById("caixamatricula").value;
   
    if (caixadenome.trim() === "" || caixadeemail.trim() === "" || caixamatricula.trim() === "")
    {
        
        Swal.fire({
            title: "Erro no registro",
            text: "Preencha todas as caixas do formulário",
            icon: "error"
          });

          console.log ("(X) Puxou a function da modal, mas não preencheu todas as informações")
          console.log ("Que bom, o seu nome é: " + caixadenome + " seu email é " + caixadeemail)
    } 
    
    else {

        Swal.fire({
            title: "Cadastrado com sucesso!",
            text: "Atualize a página e continue a operação",
            icon: "success"
          });

        console.log ("(3.1) As informações de email foram enviadas");
        // console.log (caixamatricula + " " +caixadenome + " " + caixadeemail)

        if (caixadenome !=="" && caixadeemail !=="" && caixamatricula !=="") 

        $.ajax({
            url: 'registrarpessoas.php',
            method: 'POST',
            data: {
               caixaname: caixadenome,
               caixaemail: caixadeemail,
               caixamatricula: caixamatricula,
            },

            success: function (response) {
                console.log("(3.2) Deu bom! AJAX está enviando");
                console.log (caixamatricula + " " +caixadenome + " " + caixadeemail)
                console.log(response);

                
            },
            error: function (error) {
                // console.log('Erro na solicitação AJAX:', error);
            }
        });
    };

};
 
