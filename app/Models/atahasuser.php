<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class atahasuser extends Model
{
    use HasFactory;
    

/**
 * Metodo usado para retornar para retornar os responsáveis da ata via ID
 *
 * @param int $dados
 * @return void
 */
public static function getUsersAdmAta($dados)
{
    
    $userIds = DB::connection('mysql')
        ->table('ata_has_user')
        ->where('id_ata', $dados)
        ->pluck('id_user');

    if ($userIds->isEmpty()) {
        return collect();
    }

    return DB::connection('mysql')
        ->table('users')
        ->whereIn('id', $userIds)
        ->get();
}

/**
 * Metodo usado para retornar os participantes de uma ata via ID
 *
 * @param int $dados
 * @return void
 */
public static function getUsersParticipantesForAta($dados){

    $userIds = DB::connection('mysql')
        ->table('ata_has_userparticipante')
        ->where('id_ata', $dados)
        ->pluck('id_user');

    if ($userIds->isEmpty()) {
        return collect();
    }

    return DB::connection('mysql')
        ->table('users')
        ->whereIn('id', $userIds)
        ->get();

}




}
