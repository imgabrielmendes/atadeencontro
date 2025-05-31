<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;


class home extends Model
{
    use HasFactory;

    public static function getAllLocais()
    {
        $table = "local";
        $fields = "*";
        $where = "";
    
        $dadosMySql = DB::connection('mysql')->select("SELECT $fields FROM $table");
        return $dadosMySql;
    }

    public static function getAllUsers()
    {
        $table = "users";
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
                usu.name as nome,
                sis.nome as local
            FROM atadeencontro.ata_has_fac as ahf
                INNER JOIN assunto as ass ON ass.id = ahf.id_ata
                INNER JOIN users as usu ON usu.id = ahf.facilitadores
                INNER JOIN sistema as sis ON sis.id = ass.local
                
            WHERE ahf.id_ata = ?
            order by usu.name asc
        ";
    
        $dadosMySql = DB::connection('mysql_other')->select($query, [$dados]);
        return $dadosMySql;
    }

    public static function lastParticipantesforata($dados)
    {
        $query = "
        SELECT 
        part.id_ata,
        part.participantes,
        us.name

        FROM 
        atareu.participantes as part
            INNER JOIN l_breeze.users as us
                ON us.id = part.participantes
                
                where part.id_ata = ?
                order by us.name asc
        ";

        $dadosMySql = DB::connection('mysql_other')->select($query, [$dados]);
        return $dadosMySql;
    }

    /**
     * 
     * METODO QUE RETORNAR TODAS AS ATAS EM QUE O USUÁRIO CRIOU OU PARTICIPOU
     */
    public static function ataInformationsforID($dados)
    {

        $query = "
        SELECT 

        us.name,

        ass.id,
        ass.data_solicitada,
        ass.local,
        ass.objetivo,
        ass.status,
        ass.tema,
        
        ahf.facilitadores,
        tp.texto_princ

        FROM atareu.assunto as ass
            INNER JOIN atareu.ata_has_fac as ahf
                ON ahf.id_ata = ass.id
            INNER JOIN atareu.textoprinc as tp
                ON tp.id_ata = ass.id
            INNER JOIN l_breeze.users as us
                ON us.id = ahf.facilitadores
                
                where ahf.facilitadores = ?
                order by us.name asc
        ";

        $dadosMySql = DB::connection('mysql_other')->select($query, [$dados]);
        return $dadosMySql;

    }

    public static function deliberacoesEdeliberadores($dados)
    {
        $query = "
        SELECT 
        del.id,
        del.id_ata,
        us.name ,
        del.deliberacoes
        FROM atareu.deliberacoes as del
            INNER JOIN l_breeze.users as us
                ON us.id = del.deliberadores
                where del.id_ata = ?
        ";

        $dadosMySql = DB::connection('mysql_other')->select($query, [$dados]);
        return $dadosMySql;
    }

    public static function finalizarAta(Request $request)
    {
        Log::info("ATA FINALIZADA", $request->all());
    
        $validatedData = $request->validate([
            'id_ata' => 'required|integer'
        ]);
    
        $id_ata = $validatedData['id_ata'];
    
        $updated = DB::connection('mysql_other')
            ->table('atareu.assunto') 
            ->where('id', $id_ata)   
            ->update(['status' => '2']);
    
        return $updated > 0;
    }
    
    


}
