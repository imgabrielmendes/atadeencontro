<?php

namespace App\Http\Controllers;

use App\Models\home;
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
        $locais = home::getAllLocais();
        $usuarios = home::getAllUsers();
    
        $data = [
            "usuarios" => $usuarios,
            "locais" => $locais
        ];
    
        return view('home', $data);
    }
    

    /**
     * Undocumented function
     *
     * @param float $id ID da ata em que vai trazer os participantes selecionados pelo Admin da ata
     * @return void
     */
    public function getParticipantesPage($id)
    {
        $usuarios = home::getAllUsers();
        $atas = home::lastAtaforuser($id);
    
        // Testa se a consulta realmente retorna algo
        if (empty($atas)) {
            Log::info("Nenhuma ata encontrada para o usuário ID: " . $id);
        } else {
            Log::info("Atas encontradas:", ['atas' => $atas]);
        }
    
        return view('participantes', [
            'usuarios' => $usuarios,
            'atas' => $atas,
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

    $usuarios = $atas->map(function ($ata) {
        return [
            'id' => $ata->facilitadores ?? null,
            'name' => $ata->name ?? 'Sem Nome',
        ];
    })->merge($participantes->map(function ($participante) {
        return [
            'id' => $participante->participantes ?? null,
            'name' => $participante->name ?? 'Sem Nome',
        ];
    }));

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
