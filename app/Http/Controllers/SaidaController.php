<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Saida;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Produto;
use Exception;
use Illuminate\Support\Facades\DB;

class SaidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Saida::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'id_produto'  => 'required|integer',
            'id_fornecedor' => 'required|integer',
            'quantidade' => 'required|integer|min:1',
            'nota_fiscal' => 'required|string',
            'observacoes' => 'nullable|string',
        ];

        $feedback = [
            'id_produto.required' => 'Preencha o ID do produto',
            'id_produto.integer' => 'O ID do produto deve ser um inteiro.',
            'id_fornecedor.required' => 'Preencha o ID do fornecedor.',
            'id_fornecedor.integer' => 'O ID do fornecedor deve ser um inteiro.',
            'quantidade.required' => 'Preencha a quantidade do produto.',
            'quantidade.integer' => 'A quantidade do produto deve ser um inteiro.',
            'quantidade.min' => 'A quantidade de saída do produto deve ser maior que 0.',
            'nota_fiscal.required' => 'Preencha a Nota Fiscal do produto.',
            'nota_fiscal.string' => 'A Nota Fiscal deve ser uma string.',
            'observacoes.string' => 'As observações deve ser uma string'
        ];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'mensagem' => $validator->messages(),
            ], 400);
        }

        DB::beginTransaction();

        try {

            $entrada = Entrada::where('id_produto', '=', $request->get('id_produto'))->where('id_fornecedor', '=', $request->get('id_fornecedor'))->get()->first();

            if(isset($entrada)){

                $saida = new Saida();
                
                $saida->id_produto = $request->get('id_produto');
                $saida->id_fornecedor = $request->get('id_fornecedor');
                $saida->preco_venda = Produto::where('id', '=', $request->get('id_produto'))->value('preco_venda');
                $saida->quantidade = $request->get('quantidade');
                $saida->nota_fiscal = $request->get('nota_fiscal');
                $saida->observacoes = $request->get('observacoes');
                $saida->save();

                // Atualize a quantidade do produto
                $produto = Produto::find($request->id_produto);
                if ($produto) {
                    $produto->quantidade -= $request->quantidade;
                    if ($produto->quantidade < 0){
                        return response()->json([
                            'status_code' => '400',
                            'mensagem' => 'Não é permitido que a diferença de quantidade entre entrada e saída seja menor que 0.',
                        ], 403);
                    }
                    $produto->save();
                }

                DB::commit();

                return response()->json($saida, 201);

            }else {
                return response()->json([
                    'status_code' => 404,
                    'mensagem' => 'Relação entre produto e fornecedor não existe.'
                ], 404);
            }

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status_code' => 500,
                'mensagem' => 'Não foi possível concluir a requisição.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $saida = Saida::where('id', '=', $id)->get()->first();
        if (isset($saida)){
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Saída encontrada.',
                'saida' => $saida,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Saída não encontrada.',
                'saida' => [],
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {

        $regras = [
            'nota_fiscal' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ];

        $feedback = [];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'mensagem' => $validator->messages(),
            ], 400);
        }

        $saida = Saida::where('id', '=', $id)->get()->first();
        if (isset($saida)){
            $nota_fiscal = $request->get('nota_fiscal');
            if (isset($nota_fiscal)){
                $saida->nota_fiscal = $request->get('nota_fiscal');
            }
            $observacoes = $request->get('observacoes');
            if (isset($observacoes)){
                $saida->observacoes = $request->get('observacoes');
            }
            if (isset($nota_fiscal) || isset($observacoes)){
                $saida->update();
                return response()->json([
                    'status_code' => 200,
                    'mensagem' => 'Saída alterada.',
                    'saida' => $saida,
                ], 200);
            }else {
                return response()->json([
                    'status_code' => 400,
                    'mensagem' => 'Nenhum parâmetro inserido.',
                    'saida' => [],
                ], 400);
            }
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Saída não encontrada.',
                'saida' => [],
            ], 404);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $saida = Saida::where('id', '=', $id)->get()->first();
            if (isset($saida)) {
                // Atualize a quantidade do produto
                $produto = Saida::find($saida->id_produto);
                if ($produto) {
                    $produto->quantidade += $saida->quantidade;
                    $produto->save();
                }

                $saida->delete();

                DB::commit();

                return response()->json([
                    'status_code' => 200,
                    'mensagem' => "Saída excluída."
                ], 200);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'mensagem' => "Saída não encontrada."
                ], 404);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'mensagem' => 'Não foi possível concluir a requisição.',
            ], 500);
        }
    }
}
