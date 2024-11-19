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

        $atas = home::lastAtaforuser($id);
        // return $atas;

        $ata = $atas[0];

        // return $ata;

        $dataRegistro = new \DateTime($ata->data_solicitada);
        $ata->data_solicitada_formatada = $dataRegistro->format('d/m/Y'); 

        $data = [
            "usuarios" => $usuarios,
            "ata" => $ata
        ];

        return view('participantes', $data)->render();

    }

    public function getDeliberacoesPage($id)
    {
        $usuariosdaata = home::lastParticipantesforata($id);
        // return $usuariosdaata;

        $atas = home::lastAtaforuser($id);
        // return $atas;

        $ata = $atas[0];

        // return $ata;

        $dataRegistro = new \DateTime($ata->data_solicitada);
        $ata->data_solicitada_formatada = $dataRegistro->format('d/m/Y'); 

        $data = [
            "usuarios" => $usuariosdaata,
            "ata" => $ata
        ];

        return view('deliberacoes', $data)->render();
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
