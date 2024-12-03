<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtividadesUserController extends Controller
{
    public function Home(){
        return view('youtasks');
    }
}
