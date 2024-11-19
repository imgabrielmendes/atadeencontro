

@extends('layouts.layout')
@section('title', 'Ata de encontro | Histórico')
@section('content')

{{-- // include("vendor/autoload.php");
include_once("app/acoesform.php");
include("conexao.php");

$puxarform = new AcoesForm;
$facilitadores = $puxarform->selecionarFacilitadores();
$pegarfa = $puxarform->pegarfacilitador();
$pegarid = $puxarform->puxarId();
$resultados = $puxarform->pegandoTudo();
$puxaparticipantes = $puxarform->buscarParticipantesPorIdAta($id_ata = "?");
$puxadeliberacoes = $puxarform->buscarDeliberacoesPorIdAta($id_ata = "?");

$ultimaata = $puxarform->pegarUltimaAta();

    
<style>
          body{
        background-color: rgba(240, 240, 240, 0.41);
      }

  .content-header{
        background-color: #001f3f;
    }

    #hist{
        font-size: 24px;
    }
    #filter{
        font-size: 14px;
        padding-right: 10px;
    }

    .custom-table {
        border-collapse: collapse;
    }

    

    .custom-table th:first-child,
    .custom-table td:first-child {
        border-left: none; 
        
    }

    .custom-table th:last-child,
    .custom-table td:last-child {
        border-right: none; 
    }
  
    </style> --}}

    <div class="box box-primary">
        <main class="container d-flex justify-content-center align-items-center" class="text-center">
            <div class="form-group col-12">
                <div class="row">
                    <div class="text-center" class="row">
                        
                    @include('assets.filtro')

                    @include('assets.tablehistorico')

</div>


    <script>
    function abrirModalDetalhes(row) {
        document.getElementById("modal_solicitacao").innerText = row.data_solicitada;
        document.getElementById("modal_objetivo").innerText = row.objetivo;
        document.getElementById("modal_facilitador").innerText = row.facilitador;
        document.getElementById("modal_local").innerText = row.local;
        document.getElementById("modal_tema").innerText = row.tema;


        var deliberacoes = document.getElementById("deliberacoes" + row.id).innerHTML;
    document.getElementById("modal_deliberacoes").innerHTML = deliberacoes;

        var participantes = document.getElementById("participantes" + row.id).innerText;
        document.getElementById("modal_participantes").innerText = participantes; 

        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            backdrop: 'static',
            keyboard: false 
        });
        myModal.show();
        }
    </script>






<!-- var participantes = document.getElementById("participantes" + row.id).innerText;
        document.getElementById("modal_participantes").innerText = participantes;  -->





    <script>
        function filtrarTabela() {
            var input, filtro, tabela, linhas, celula, texto;
            input = document.getElementById("temaprincipal");
            filtro = input.value.toUpperCase();
            tabela = document.getElementById("myTable");
            linhas = tabela.getElementsByTagName("tr");

            for (var i = 0; i < linhas.length; i++) {
                var encontrou = false; 
                celula = linhas[i].getElementsByTagName("td");
                for (var j = 0; j < celula.length; j++) {
                    if (celula[j]) {
                        texto = celula[j].innerText.toUpperCase() || celula[j].textContent.toUpperCase();
                        if (texto.indexOf(filtro) > -1) {
                            encontrou = true;
                            break;
                        }
                    }
                }
                if (encontrou) {
                    linhas[i].style.display = "";
                } else {
                    linhas[i].style.display = "none";
                }
            }
        }
        function filtrarRegistros(event) {
            event.preventDefault();
            var tabela, linhas;
            tabela = document.getElementById("myTable");
            linhas = tabela.getElementsByTagName("tr");

            var selectedObjective = document.getElementById("objetivoSelect").value.toUpperCase();
            var selectedSolicitacao = document.getElementById("solicitacaoInput").value; 
            var selectedStatus = document.getElementById("statusSelect").value.toUpperCase();

            for (var i = 1; i < linhas.length; i++) {
                var atendeFiltro = true; 
                var celulas = linhas[i].getElementsByTagName("td");
                var dataCelula = celulas[0].textContent.trim();
                if (selectedSolicitacao) {
                    var partesDataCelula = dataCelula.split("/");
                    var dataFormatadaCelula = partesDataCelula[2] + "-" + partesDataCelula[1] + "-" + partesDataCelula[0];
                    
                    if (dataFormatadaCelula !== selectedSolicitacao) {
                        atendeFiltro = false;
                    }
                }
                if (selectedObjective && celulas[1].innerText.toUpperCase() !== selectedObjective) {
                    atendeFiltro = false;
                }
                if (selectedStatus && celulas[5].innerText.toUpperCase() !== selectedStatus) {
                    atendeFiltro = false;
                }
                if (atendeFiltro) {
                    linhas[i].style.display = "";
                } else {
                    linhas[i].style.display = "none";
                }
            }
            window.scrollTo(0, 0);
        }
        window.onload = function() {
            var table = document.getElementById("myTable");
            var linhas = table.getElementsByTagName("tr");
            for (var i = 0; i < linhas.length; i++) {
                linhas[i].addEventListener("click", function() {
                    var data_solicitada = this.cells[0].innerText;
                    var objetivo = this.cells[1].innerText;
                    var facilitador = this.cells[2].innerText;
                    var tema = this.cells[3].innerText;
                    var local = this.cells[4].innerText;
                    var status = this.cells[5].innerText;
                    var rowData = {
                        data_solicitada: data_solicitada,
                        objetivo: objetivo,
                        facilitador: facilitador,
                        local: local,
                        tema: tema,
                        status: status
                    };
                    abrirModalDetalhes(rowData);
                });
            }
        };
    </script>
    {{-- <script src="view/js/bootstrap.js"></script> --}}
    {{-- <script src="app/gravar.js"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}

@endsection