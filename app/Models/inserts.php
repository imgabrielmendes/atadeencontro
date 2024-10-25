<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inserts extends Model
{
    use HasFactory;

    public function insertAta(Request $request)
    {
        $dados = [
            'data_solicitada' => $request->data,
            'hora_inicial' => $request->horainicio,
            'hora_termino' => $request->horat,
            'objetivo' => $request->objetivos,
            'local' => $request->local,
            'tema' => $request->tema,
        ];

        $id = DB::connection('mysql_other')->table('atareu.assunto')->insertGetId($dados);

        if ($id) {
            return response()->json(['success' => true, 'message' => 'Ata registrada com sucesso!', 'id' => $id]);
        } else {
            return response()->json(['success' => false, 'message' => 'Falha ao registrar a ata.'], 500);
        }
    }
}
