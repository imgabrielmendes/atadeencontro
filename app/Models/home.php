<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class home extends Model
{
    use HasFactory;

    public static function getAllLocais()
    {
        $table = "hrg_centralservicos.perfil";
        $fields = "*";
        $where = "";
    
        $dadosMySql = DB::connection('mysql')->select("SELECT $fields FROM $table");
        return $dadosMySql;
    }

    public static function getAllUsers()
    {
        $table = "l_breeze.users";
        $fields = "*";
        $where = "";
    
        $dadosMySql = DB::connection('mysql')->select("SELECT $fields FROM $table");
        return $dadosMySql;
    }

    public static function pegarAtas()
    {
        $table = "assunto";
        $fields = "*";
        $where = "";

        $dadosMySql = DB::connection('mysql_other')->select("SELECT $fields FROM $table");

        return $dadosMySql;
    }
}
