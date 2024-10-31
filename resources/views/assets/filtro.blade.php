<table id="" class="table table-striped">
    <tbody>
        <div class="accordion" id="accordionPanelsStayOpenExample" class="text-center">
            <div class="accordion-item text-center">
                <h2 class="accordion-header">
                    <button class="accordion-button shadow-sm text-white text-center" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" style="background-color: #1c8f69 ">
                       
                        
                        <i id="filter" class="fa-solid fa-filter mb-1"></i><h5>Filtro de Atas</h5>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" class="text-center">
                    <div class="accordion-body">
                        <div class="col">
                           
                            <input id="temaprincipal" class="form-control mt-3" type="text" onkeyup="filtrarTabela()" placeholder="Filtrar registros..." />
                        </div>
                        <!-- <input style="border: 1px solid #0000;" class="form-control item" type="text" id="filtroInput" onkeyup="filtrarTabela()" placeholder="Filtrar registros..."> -->

                      
                        <div class="row">
                            <div class="col-xl-4 col-sm-12 col-md-6" style="text-align: left;">
                                <div class="mb-2 mt-2">
                                <b>Objetivo</b>
                                </div>
                                <select class="form-control" id="objetivoSelect" onchange="filtrarRegistros(event)">
                                    <option value="">Selecione o objetivo</option>
                                    <option value="Reunião">Reunião</option>
                                    <option value="Treinamento">Treinamento</option>
                                    <option value="Consulta">Consulta</option>
                                </select>
                            </div>
                            <div class="col-xl-4 col-sm-12 col-md-6" style="text-align: left;">
                                <div class="mb-2 mt-2">
                                <b>Solicitação</b>
                                </div>
                                <input class="form-control" type="date" id="solicitacaoInput" onchange="filtrarRegistros(event)">
                            </div>
                            <div class="col-xl-4 col-sm-12 col-md-6" style="text-align: left;">
                            <div class="mb-2 mt-2">
                                <b>Status</b>
                                </div>
                                <select class="form-control " id="statusSelect" onchange="filtrarRegistros(event)">
                                    <option value="">Selecione o status</option>
                                    <option value="Aberta">Aberta</option>
                                    <option value="Fechada">Fechada</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
</tbody> 
</table>