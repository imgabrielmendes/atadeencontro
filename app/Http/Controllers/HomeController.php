<?php

namespace App\Http\Controllers;

use App\Models\home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{


    public function getHome()
    {
        $locais = home::getAllLocais();
        $usuarios = home::getAllUsers()->unique('id');

        // return $usuarios;
    
        $data = [
            "usuarios" => $usuarios->values(),
            "locais" => $locais
        ];
    
        // return $usuarios;
        return view('home', $data)->render();
    }
    

    public function getParticipantesPage($id)
    {
        $usuarios = home::getAllUsers();
        $atas = json_decode(json_encode(home::lastAtaforuser($id)));        
    
        foreach ($atas as $ata) {
            if (!empty($ata->data_solicitada)) {
                $dataRegistro = new \DateTime($ata->data_solicitada);
                $ata->data_solicitada_formatada = $dataRegistro->format('d/m/Y');
            }
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
    
        // Unificar estrutura de usuários
        $usuarios = $atas->map(function ($ata) {
            return [
                'id' => $ata->facilitadores,
                'name' => $ata->name,
            ];
        })->merge($participantes->map(function ($participante) {
            return [
                'id' => $participante->participantes,
                'name' => $participante->name,
            ];
        }));
    
        // Retorna todas as variáveis para a view
        return view('deliberacoes', [
            // INFORMAÇÕES DE REGISTRO
            'atas' => $atas,
            // PARTICIPANTES ADICIONADOS
            'participantes' => $participantes,
            'deliberacoes' => $deliberacoes,
            // BOX DE MULTISELECT
            'usuarios' => $usuarios,
        ]);
    }
    



    public function getHistoricoPage()
    {
        $usuarioId = Auth::id();
        // return $usuarioId;

        $ata = home::ataInformationsforID($usuarioId);
        // return $ata;

        $dados = [
            "ata" => $ata
        ];

        return view('historico', $dados)->render();
    }

}
