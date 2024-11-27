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
        'tema' => $request->tema,
        'status' => 1
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
    $participantes = $request->participantes;

    if (empty($participantes) || !is_array($participantes)) {
        return response()->json(['success' => false, 'message' => 'Nenhum participante foi informado.']);
    }

    $dados = [];
    foreach ($participantes as $part) {
        $dados[] = [
            'id_ata' => $id_ata,
            'participantes' => $part,
        ];
    }

    try {
        // Inserir todos os dados de uma vez
        DB::connection('mysql_other')->table('atareu.participantes')->insert($dados);

        return response()->json([
            'success' => true,
            'message' => 'Ata e facilitadores registrados com sucesso!',
            'id' => $id_ata
        ]);

    } catch (\Exception $e) {
        Log::error('Erro ao inserir participantes:', ['error' => $e->getMessage()]);

        return response()->json([
            'success' => false,
            'message' => 'Erro ao registrar os participantes. Tente novamente mais tarde.',
        ]);
    }
}



public function insertTextoPrincipal(Request $request)
{
    Log::info('Dados recebidos para o texto principal:', $request->all());

    $validatedData = $request->validate([
        'id_ata' => 'required|integer',
        'caixadetexto' => 'required|string|max:255',
    ]);

    $id_ata = $validatedData['id_ata'];
    $textoPrincipal = $validatedData['caixadetexto'];

    try {
        $dados = [
            'id_ata' => $id_ata,
            'texto_princ' => $textoPrincipal,
        ];

        $id = DB::connection('mysql_other')->table('atareu.textoprinc')->insertGetId($dados);

        return response()->json([
            'success' => true,
            'message' => 'Texto principal registrado com sucesso!',
            'id' => $id
        ]);
    } catch (\Exception $e) {
        Log::error('Erro ao registrar texto principal:', ['error' => $e->getMessage()]);

        return response()->json([
            'success' => false,
            'message' => 'Erro ao registrar o texto principal. Tente novamente mais tarde.'
        ], 500);
    }
}

public function insertDeliberacoes(Request $request){

    log::info("Deliberacoes recebidas:" , $request->all());

    $validatedData = $request->validate([
        'id_ata' => 'required|integer',
        'deliberacao' => 'required',
        'participantes' => 'required',
    ]);

    $id_ata = $validatedData['id_ata'];
    $deliberacao = $validatedData['deliberacao'];
    $participantes = $validatedData['participantes'];

    $dados = [];
    foreach ($participantes as $part) {
        $dados[] = [
            'id_ata' => $id_ata,
            'deliberadores' => $part,
            'deliberacoes' => $deliberacao,
        ];
    }

    try {
        DB::connection('mysql_other')->table('atareu.deliberacoes')->insert($dados);

        return response()->json([
            'success' => true,
            'message' => 'Deliberacoes registradas com sucesso!',
            'id' => $id_ata
        ]);

    } catch (\Exception $e) {
        Log::error('Erro ao inserir a deliberacao:', ['error' => $e->getMessage()]);

        return response()->json([
            'success' => false,
            'message' => 'Erro ao registrar os participantes. Tente novamente mais tarde.',
        ]);
    }

}    
}
