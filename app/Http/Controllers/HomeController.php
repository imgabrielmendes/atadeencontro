<?php

namespace App\Http\Controllers;

use App\Models\home;
use App\Models\local;
use App\Models\usuario;
use App\Models\setor;
use App\Models\atahasuser;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class HomeController extends Controller
{

    /**
     * Undocumented function
     *
     * @return void
     */
public function getHome()
{
    $locais = local::getAllLocais();
    $usuarios = usuario::getAllUsers();
    
    $setores = setor::getAllSetores();

    return view('home.home', [
        'locais' => $locais,
        'usuarios' => $usuarios,
        'setores' => $setores
    ]);
}

    /**
     * Undocumented function
     *
     * @param float $id ID da ata em que vai trazer os participantes selecionados pelo Admin da ata
     * @return void
     */
    public function getParticipantesPage($id)
    {

        $ataInformacoes = home::getAtaInformationForId($id);

        $ataUsersAdm = atahasuser::getUsersAdmAta($id);

        $usuarios = usuario::getAllUsers();

        $usuariosOptions = $usuarios->map(fn($u) => [
            'value' => $u->id,
            'label' => $u->name,
        ])->toArray();

        //dd($ataInformacoes);
        //dd($usuariosOptions);
        //dd($usuarios);

    
        return view('participantes', [
            'usuarios' => $usuarios,
            'ata' => $ataInformacoes,
            'usuariosOptions' => $usuariosOptions
        ])->render();
    }
    
    public function getDeliberacoesPage($id)
    {

        $ataInformacoes = home::getAtaInformationForId($id);

        $ataUsersAdm = atahasuser::getUsersAdmAta($id);
        
        $ataUserParticipante = atahasuser::getUsersParticipantesForAta($id);

        $usuarios = usuario::getAllUsers();

        // dd($id);
        // dd($ataUserParticipante);

        $usuariosOptions = $usuarios->map(fn($u) => [
            'value' => $u->id,
            'label' => $u->name,
        ])->toArray();
            
        return view('deliberacoes', [
            'ata' => $ataInformacoes,
            'participantes' => $ataUserParticipante,
            'usuarios' => $ataUsersAdm,
            'usuariosOptions' => $usuariosOptions
        ]);
    }
    

public function getHistoricoPage()
{
    $usuarioId = Auth::id();
    
    // Retorna as atas associadas ao usuário
    $atas = home::ataInformationsforID($usuarioId);
    
    // Verificando o status da ata e atribuindo o valor correto
    foreach ($atas as $ata) {
        if (isset($ata->status) && $ata->status == 1) {
            $ata->status_text = "Aberto"; // Adicionando status como uma propriedade
        } else {
            $ata->status_text = "Fechado"; // Caso contrário, definindo como "Fechado"
        }
    }

    // Passando as atas para a view
    return view('historico', ['atas' => $atas]);
}

}
