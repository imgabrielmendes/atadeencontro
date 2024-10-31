<div class="table-responsive custom-scrollbar">
    <table id="myTable" class="table table-hover shadow custom-table">

        <thead>
            <tr>
                <th class="text-center">Data</th>
                <th class="text-center">Objetivo</th>
                <th class="text-start">Tema</th>
                <th class="text-start">Local</th>
                <th class="text-center">Status</th>
                <th class="text-center">Ação</th>
                <th class="text-center">Imprimir</th>
            </tr>
        </thead>
<tbody>

@foreach($ata as $atas)
<tr>
<td class='align-middle' onclick='abrirModalDetalhes(" . json_encode($row) . ")'> {{$atas->data_solicitada}} </td>;
<td class='align-middle' onclick='abrirModalDetalhes(" . json_encode($row) . ")'> {{$atas->objetivo}} </td>;
<td class='text-start'   onclick='abrirModalDetalhes(" . json_encode($row) . ")'> {{$atas->tema}} </td>;
<td class='text-start'' onclick='abrirModalDetalhes(" . json_encode($row) . ")'> {{$atas->local}}</td>;
<td class='align-middle status-cell' onclick='abrirModalDetalhes(" . json_encode($row) . ")'> {{$atas->status}} 
{{-- <td class='align-middle status-cell' onclick='abrirModalDetalhes(" . json_encode($row) . ")'> . ($row['status'] === 'ABERTA' ? <span class='badge bg-primary'>ABERTA</span>" : "<span class='badge bg-success'>FECHADA</span>") . </td> --}}

<td class='text-center align-middle'>
        <a href='pagatribuida.php?updateid=".$id."' class='btn btn-warning' style='color: white;'>
            <button class='text-center align-middle' style='color:white; border: none; background: transparent;'>&plus;</button>
        </a>
    </td>
    <td class='text-center align-middle'>
        <a href='pagatribuida.php?updateid=".$id."' class='btn btn-warning' style='color: white;'>
            <button class='text-center align-middle' style='color:white; border: none; background: transparent;'>&plus;</button>
        </a>
    </td>
@endforeach

    
{{-- // código para exibir as colunas da tabela...
// Definindo $puxaparticipantes dentro do loop
$puxaparticipantes = $puxarform->buscarParticipantesPorIdAta($id);

// Definindo $deliberacoes dentro do loop
$deliberacoes = $puxarform->buscarDeliberacoesPorIdAta($id);

    // Lógica para exibir os botões de acordo com $deliberacoes e $puxaparticipantes
    if (empty($deliberacoes) && !empty($puxaparticipantes)) {
        // Exibir o PDF sem deliberação, mas com participante
        <td class='text-center align-middle'>
                    <a class='text-light btn btn-success' href='arquivo_semdel.php?updateid=".$id."'>
                        <i class='fas fa-file-pdf'></i>
                    </a>
                </td>";
    } elseif (empty($deliberacoes) && empty($puxaparticipantes)) {
        // Exibir o PDF sem participante e sem deliberação
        <td class='text-center align-middle'>
                    <a class='text-light btn btn-success' href='arquivo_sempart.php?updateid=".$id."'>
                        <i class='fas fa-file-pdf'></i>
                    </a>
                </td>";
    } else {
        // Exibir o PDF com deliberação e participante
        <td class='text-center align-middle'>
                    <a class='text-light btn btn-success' href='arquivopdf.php?updateid=".$id."'>
                        <i class='fas fa-file-pdf'></i>
                    </a>
                </td>";
    } --}}
    
   




    ;
<td class='align-middle' style='display:none;' onclick='abrirModalDetalhes(" . json_encode($row) . ")'>

{{-- <td class='align-middle' style='display:none;' id='participantes" . $row['id'] . "'>"; 
if (isset($row['id'])) {
    $id_ata = $row['id'];
    $puxaparticipantes = $puxarform->buscarParticipantesPorIdAta($id_ata);
    if (!empty($puxaparticipantes) && is_array($puxaparticipantes)) {
        $totalParticipantes = count($puxaparticipantes);
        $count = 0;
        foreach ($puxaparticipantes as $participante) {
            echo   $participante ;
            $count++;
            if ($count < $totalParticipantes) {
                ,";
            }
        }
    } else {
        Nenhum participante";
    }
} else {
    ID da ata não disponível";
}
</td>"; --}}

{{-- if (isset($row['id'])) {
    $id_ata = $row['id'];
    $deliberacoes = $puxarform->buscarDeliberacoesPorIdAta($id_ata);
    if (!empty($deliberacoes) && is_array($deliberacoes)) {
        // Inicializa um array associativo para armazenar as deliberações únicas e os deliberadores associados a cada deliberação
        $deliberacoes_unicas = array();
        
        // Agrupa os deliberadores por deliberação, evitando repetições
        foreach ($deliberacoes as $deliberacao) {
            $texto_deliberacao = $deliberacao['deliberacoes'];
            $deliberador = $deliberacao['deliberador'];
            // Adiciona o deliberador apenas se esta deliberação ainda não estiver presente no array
            if (!isset($deliberacoes_unicas[$texto_deliberacao])) {
                $deliberacoes_unicas[$texto_deliberacao] = array();
            }
            // Adiciona o deliberador ao array associado à deliberação
            $deliberacoes_unicas[$texto_deliberacao][] = $deliberador;
        } --}}
        
        <td class='deliberacao-cell text-left' style='display:none;' id='deliberacoes" . $row['id']
        {{-- // Exibe as deliberações únicas e os deliberadores associados a cada deliberação
        foreach ($deliberacoes_unicas as $texto_deliberacao => $deliberadores) { --}}
            <div class='col-6 bg-body-secondary form-control deliberacao' style='max-height: 80px;'>" . $texto_deliberacao . "<br>
            {{-- // Exibe os deliberadores associados a esta deliberação
            $deliberadores_concatenados = implode(", ", $deliberadores); --}}
            <div class='deliberador'>" . $deliberadores_concatenados . "</div>
            </div><br> // Adiciona uma quebra de linha após cada bloco de deliberação
        }
        </td>
        <td  class='deliberador-cell text-left' style='display:none;' id='deliberadores" . $row['id'] . "'>
        {{-- // Exibe os deliberadores associados a cada deliberação única
        foreach ($deliberacoes_unicas as $texto_deliberacao => $deliberadores) {
            $deliberadores_concatenados = implode(", ", $deliberadores); --}}
            <div class='col-6 bg-body-secondary form-control deliberador'>" . $deliberadores_concatenados . "</div>
            <br>"; // Adiciona uma quebra de linha após cada bloco de deliberadores
        }
        </td>
    }
        <td class='deliberacao-cell align-middle' style='display:none;' id='deliberacoes" . $row['id'] . "'>
        <div class='col-6 bg-body-secondary form-control'>Nenhuma deliberação</div>
        </td>";
        
        <td class='deliberador-cell align-middle' style='display:none;' id='deliberadores" . $row['id'] . "'>
        <div class='col-6 bg-body-secondary form-control'>Nenhum deliberador</div>
        </td>
    }
    
    
    
    
      
    
}                     

</tr>
{{-- }
} else {
<tr><td colspan='8'>Nenhum registro encontrado.</td></tr>";
} --}}

</tbody>
</table>


</div>