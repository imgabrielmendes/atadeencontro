<?php

namespace App\Http\Controllers;

use App\Models\home;
use Illuminate\Http\Request;



class HomeController extends Controller
{

    public function getHome()
    {

        $locais = home::getAllLocais();
        // return $locais;
        $usuarios = home::getAllUsers();

        // return view('home')->render();

        $data = [
            "usuarios" => $usuarios,
            "locais" => $locais
        ];

        return view('home', $data)->render();
    }

    public function participantes()
    {
        return view('participantes')->render();
    }
}
