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
    
        // Inserção do primeiro formulário
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

            /**
             * 
             * SEGUNDO INSERT - PEGA A ID DA PESSOA QUE INICIOU A ATA E A ATA QUE ELA VAI CRIAR
             */

            $facilitadores = json_decode($request->facilitadores, true); 
            $facilitadorId = isset($facilitadores[0]) ? $facilitadores[0] : null;
    
            $dados1 = [
                'id_ata' => $id,
                'facilitadores' => $facilitadorId,
            ];
    
            // Log::info('Inserindo facilitador com dados:', $dados1);
    
            try {

                $id1 = DB::connection('mysql_other')->table('atareu.ata_has_fac')->insertGetId($dados1);

                return response()->json(['success' => true, 'message' => 'Ata e facilitador registrados com sucesso!', 'id' => $id]);
                
            } catch (\Exception $e) {

                Log::error('Erro ao inserir facilitador:', ['error' => $e->getMessage()]);

                return response()->json(['success' => false, 'message' => 'Ata registrada, mas falha ao registrar o facilitador: ' . $e->getMessage()], 500);
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
    
        // Aqui você pode fazer a  inserção no banco de dados usando a $id_ata
    
        return response()->json(['success' => true, 'message' => 'Participantes registrados com sucesso!', 'id' => $id_ata]);
    }
    
}
