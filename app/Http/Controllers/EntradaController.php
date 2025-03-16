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
            $entrada = Entrada::create($request->all());

            // Atualize a quantidade do produto
            $produto = Produto::find($request->id_produto);
            if ($produto) {
                $produto->quantidade += $request->quantidade;
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
                'Entrada' => $entrada,
            ], 200);
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
        DB::beginTransaction();

        try {
            $entrada = Entrada::where('id', '=', $id)->first();
            if ($entrada) {
                // Atualize a quantidade do produto
                $produto = Produto::find($entrada->id_produto);
                if ($produto) {
                    $produto->quantidade -= $entrada->quantidade;
                    $produto->save();
                }

                $entrada->delete();

                DB::commit();

                return response()->json([
                    'status_code' => 200,
                    'mensagem' => "Entrada excluída."
                ], 200);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'mensagem' => "Entrada não encontrada."
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
