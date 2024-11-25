<?php

namespace App\Http\Controllers;

use App\Models\home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    
        $usuarios = $atas->merge($participantes);
    
        $atas = $atas->map(function ($ata) {
            if (!empty($ata->data_solicitada)) {
                $ata->data_solicitada_formatada = (new \DateTime($ata->data_solicitada))->format('d/m/Y');
            }
            
            return $ata;
        });
    
        return view('deliberacoes', [
            'usuarios' => $usuarios,
            'atas' => $atas,
            'participantes' => $participantes,
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
