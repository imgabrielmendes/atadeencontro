<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


    public static function lastAtaforuser($dados)
    {
        $query = "
            SELECT *,
                usu.name as nome
            FROM atareu.ata_has_fac as ahf
                INNER JOIN atareu.assunto as ass ON ass.id = ahf.id_ata
                INNER JOIN l_breeze.users as usu ON usu.id = ahf.facilitadores
            WHERE ahf.id_ata = ?
        ";
    
        $dadosMySql = DB::connection('mysql_other')->select($query, [$dados]);
        return $dadosMySql;
    }

    public static function lastParticipantesforata($dados)
    {
        $query = "
        SELECT 
        ahf.id_ata,
        us.* 

        FROM atareu.ata_has_fac as ahf
            INNER JOIN l_breeze.users as us
                ON us.id = ahf.facilitadores
                where ahf.id_ata = ?
        ";

        $dadosMySql = DB::connection('mysql_other')->select($query, [$dados]);
        return $dadosMySql;
    }
    
}
