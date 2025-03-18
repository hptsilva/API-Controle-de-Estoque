<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Produto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Entrada::all();
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
            'quantidade.min' => 'A quantidade do produto deve ser maior que 0.',
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

            $entrada = new Entrada();

            $entrada->id_produto = $request->get('id_produto');
            $entrada->id_fornecedor = $request->get('id_fornecedor');
            $entrada->preco_custo = Produto::where('id', '=', $request->get('id_produto'))->value('preco_custo');
            $entrada->quantidade = $request->get('quantidade');
            $entrada->nota_fiscal = $request->get('nota_fiscal');
            $entrada->observacoes = $request->get('observacoes');
            $entrada = $entrada->save();

            // Atualize a quantidade do produto
            $produto = Produto::find($request->id_produto);
            if ($produto) {
                $produto->quantidade += $request->get('quantidade');
                $produto->save();
            }

            DB::commit();

            return response()->json($entrada, 201);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'mensagem' => 'Não foi possível concluir a requisição.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $entrada = Entrada::where('id', '=', $id)->get()->first();
        if (isset($entrada)){
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Entrada encontrada.',
                'entrada' => $entrada,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Entrada não encontrada.',
                'entrada' => [],
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

        $entrada = Entrada::where('id', '=', $id)->get()->first();
        if (isset($entrada)){
            $nota_fiscal = $request->get('nota_fiscal');
            if (isset($nota_fiscal)){
                $entrada->nota_fiscal = $request->get('nota_fiscal');
            }
            $observacoes = $request->get('observacoes');
            if (isset($observacoes)){
                $entrada->observacoes = $request->get('observacoes');
            }
            if (isset($nota_fiscal) || isset($observacoes)){
                $entrada->update();
                return response()->json([
                    'status_code' => 200,
                    'mensagem' => 'Entrada alterada.',
                    'entrada' => $entrada,
                ], 200);
            }else {
                $entrada->update();
                return response()->json([
                    'status_code' => 400,
                    'mensagem' => 'Nenhum parâmetro inserido.',
                    'entrada' => [],
                ], 400);
            }
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Entrada não encontrada.',
                'entrada' => [],
            ], 404);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json([
            'status_code' => 403,
            'mensagem' => 'Não é possível excluir o registro de entrada.'
        ],403);
    }
}
