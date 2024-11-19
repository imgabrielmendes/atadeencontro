<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class inserts extends Model
{
    use HasFactory;

    /**
     * 
     * FUNÇÃO QUE REALIZA INSERT DO PRIMEIRO FORMULÁRIO
     */
    public function insertAta(Request $request)
{
    Log::info('Dados recebidos:', $request->all());

    $dados = [
        'data_solicitada' => $request->data,
        'hora_inicial' => $request->horainicio,
        'hora_termino' => $request->horat,
        'objetivo' => $request->objetivos,
        'local' => $request->local,
        'tema' => $request->tema
    ];

    $id = DB::connection('mysql_other')->table('atareu.assunto')->insertGetId($dados);

    if ($id) {

        $facilitadores = $request->facilitadores;

        $dadosFacilitadores = [];
        foreach ($facilitadores as $facilitadorId) {

            $dadosFacilitadores[] = [
                'id_ata' => $id,
                'facilitadores' => $facilitadorId
            ];

        }

        try {

            DB::connection('mysql_other')->table('atareu.ata_has_fac')->insert($dadosFacilitadores);

            return response()->json(['success' => true, 'message' => 'Ata e facilitadores registrados com sucesso!', 'id' => $id]);

        } catch (\Exception $e) {
            Log::error('Erro ao inserir facilitadores:', ['error' => $e->getMessage()]);

            return response()->json(['success' => false, 'message' => 'Ata registrada, mas falha ao registrar os facilitadores: ' . $e->getMessage()], 500);
        }
    } else {
        return response()->json(['success' => false, 'message' => 'Falha ao registrar a ata.'], 500);
    }
}

    
    /**
     * 
     * Método responsável em enviar o ID dos participantes da ata para o DB
     */
    public function insertParticipantes(Request $request)
    {

        Log::info('Dados recebidos:', $request->all());

        $id_ata = $request->input('id_ata');
        $participantes = $request->input('participantes');

        $dados = [
            'id_ata' => $id_ata,
            'facilitadores' => $participantes,
        ];
    
        $id = DB::connection('mysql_other')->table('atareu.ata_has_fac')->insertGetId($dados);
        
        return response()->json(['success' => true, 'message' => 'Participantes registrados com sucesso!', 'id' => $id_ata]);
    }

    public function insertTextoPrincipal(Request $request)
    {

        Log::info('TEXTO PRINCIPAL recebidos:', $request->all());

        $id_ata = $request->input('id_ata');
        $textoprincipal = $request->input('caixadetexto');

        $dados = [
            'id_ata' => $id_ata,
            'texto_princ' => $textoprincipal,
        ];

        $id = DB::connection('mysql_other')->table('atareu.textoprinc')->insertGetId($dados);
        return response()->json(['success' => true, 'message' => 'Participantes registrados com sucesso!', 'id' => $id_ata]);

    }
    
}
