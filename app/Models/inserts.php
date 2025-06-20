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
    //dd($request->all());

    $dados = [
        "nome" => $request->tituloAta,
        "id_local" => $request->localAta,
        "id_objetivo" => $request->objetivoAta,
        "dthr_solicitada" => $request->dthrInicioAta,
        "hr_estimado" => $request->tempoEstimadoAta,
        "status" => 1
    ];

    try {
        $id = DB::connection('mysql')->table('atadeencontro.ata')->insertGetId($dados);

        if ($id) {
            $userId = auth()->id();

            $facilitadores = $request->facilitadores ?? [];

            if (!in_array($userId, $facilitadores)) {
                $facilitadores[] = $userId;
            }

            $dadosFacilitadores = [];
            foreach ($facilitadores as $facilitadorId) {
                $dadosFacilitadores[] = [
                    'id_ata' => $id,
                    'id_user' => $facilitadorId
                ];
            }

            DB::connection('mysql')->table('atadeencontro.ata_has_user')->insert($dadosFacilitadores);

            // $descricaoAta = $request->descricaoAta;
            // $dadosDescricao = [];
            
            // $dadosDescricao[] = [
            //         'id_ata' => $id,
            //         'id_user' => $facilitadorId
            //     ];
            

        }

        return response()->json(['success' => true, 'message' => 'Ata e facilitadores registrados com sucesso!', 'id' => $id]);

    } catch (\Exception $e) {
        Log::error('Erro ao inserir ata e facilitadores:', ['error' => $e->getMessage()]);
        return response()->json(['success' => false, 'message' => 'Erro ao registrar ata e facilitadores: ' . $e->getMessage()], 500);
    }
}


    /**
     * 
     * Método responsável em enviar o ID dos participantes da ata para o DB
     */
    public function insertParticipantes(Request $request)
{
    // Log::info('Dados recebidos:', $request->all());

    $id_ata = $request->input('id_ata');
    $participantes = $request->participantes;

    // log::info('ID da ata:', $id_ata);
    log::info('participantes:', $participantes);

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
    Log::info('Texto principal:', $request->all());

    $validacao = $request->validate([
        'id_ata' => 'required|integer',
        'caixadetexto' => 'required|string|max:255',
    ]);

    $id_ata = $validacao['id_ata'];
    $textoPrincipal = $validacao['caixadetexto'];

    try {
        $dados = [
            'id_ata' => $id_ata,
            'texto_princ' => $textoPrincipal,
        ];

        $id = DB::connection('mysql_other')->table('atareu.textoprinc')->insertGetId($dados);

        return response()->json([
            'success' => true,
            'message' => 'Texto principal registrado com sucesso!',
            'textoprincipal' => $textoPrincipal,
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

public function insertDeliberacoes(Request $request)
{
    Log::info("Deliberacoes recebidas:", $request->all());

    $validacao = $request->validate([
        'id_ata' => 'required|integer',
        'deliberacao' => 'required',
        'participantes' => 'required|array',
    ]);

    $id_ata = $validacao['id_ata'];
    $deliberacao = $validacao['deliberacao'];
    $participantes = $validacao['participantes'];

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

        $usuarios = User::whereIn('id', $participantes)->get();

        return response()->json([
            'success' => true,
            'message' => 'Deliberacoes registradas com sucesso!',
            'id' => $id_ata,
            'deliberacao' => $deliberacao,
            'users' => $usuarios,
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
