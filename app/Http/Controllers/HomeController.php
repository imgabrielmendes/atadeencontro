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
    
        return view('participantes', [
            'usuarios' => $usuarios,
            'ata' => $ataInformacoes,
            'usuariosOptions' => $usuariosOptions
        ])->render();
    }
    
    public function getDeliberacoesPage($id)
    {
        $atas = collect(home::lastAtaforuser($id));
        $participantes = collect(home::lastParticipantesforata($id));
        $deliberacoes_raw = collect(home::deliberacoesEdeliberadores($id));
    
        $deliberacoes = $deliberacoes_raw->reduce(function ($result, $item) {
            $texto = $item->deliberacoes;
            $usuario = DB::table('users')->where('name', $item->name)->first();
    
            if (!$usuario) {
                return $result;
            }
    
            if (!isset($result[$texto])) {
                $result[$texto] = [
                    'deliberacoes' => $texto,
                    'users' => [],
                ];
            }
    
            if (!in_array($usuario, $result[$texto]['users'])) {
                $result[$texto]['users'][] = $usuario;
            }
    
            return $result;
        }, []);
    
        $deliberacoes = array_values($deliberacoes);
    
        $atas = $atas->map(function ($ata) {
            if (!empty($ata->data_solicitada)) {
                $ata->data_solicitada_formatada = (new \DateTime($ata->data_solicitada))->format('d/m/Y');
            }
            return $ata;
        });
    
        // Mapeia os facilitadores e participantes
        $usuarios = $atas->map(function ($ata) {
            return (object)[
                'id' => $ata->facilitadores ?? null,
                'name' => $ata->name ?? 'Sem Nome',
            ];
        });
    
        $usuarios = $usuarios->merge($participantes->map(function ($participante) {
            return (object)[
                'id' => $participante->participantes ?? null,
                'name' => $participante->name ?? 'Sem Nome',
            ];
        }));
    
        // Remove usuários duplicados, mantendo apenas os únicos com base no 'id'
        $usuarios = $usuarios->unique('id');
    
        // Log para checar os usuários únicos
        log::info($usuarios);
    
        return view('deliberacoes', [
            'atas' => $atas,
            'participantes' => $participantes,
            'deliberacoes' => $deliberacoes,
            'usuarios' => $usuarios,
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
