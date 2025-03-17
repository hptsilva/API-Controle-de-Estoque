<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Produto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Listar todos o produtos
    public function index()
    {
        return Produto::all();
    }

    // Criar um novo produto
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|max:255',
            'categoria' => 'required',
            'marca' => 'required',
            'descricao' => 'nullable|string',
            'unidade_medida' => 'required',
            'quantidade' => 'nullable|numeric|min:0|max:0',
            'preco' => 'required|numeric|min:0',
        ];

        $feedback = [
            'nome.required' => 'Preencha o nome do produto.',
            'nome.string' => 'O nome do produto deve ser do tipo string.',
            'nome.max' => 'O nome do produto deve ter no máximo 255 caracteres.',
            'categoria' => 'Preencha a categoria do produto.',
            'marca' => 'Preencha a marca do produto.',
            'descricao.string'  => 'A descrição do produto deve ser do tipo string.',
            'unidade_medida.required' => 'Preencha a unidade de medida do produto.',
            'quantidade.numeric' => 'A quantidade deve ser um valor numérico.',
            'quantidade.min' => 'A quantidade deve ser igual a 0.',
            'quantidade.max' => 'A quantidade deve ser igual a 0.',
            'preco.required' => 'Coloque o preço no produto.',
            'preco.numeric' => 'O preço do produto deve ser numérico.',
            'preco.min' => 'O valor mínimo do produto deve ser 0.',
        ];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'mensagem' => $validator->messages(),
            ], 400);
        }

        try{
            return Produto::create($request->all());
        }
        catch (Exception){
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

        $produto = Produto::where('id', '=', $id)->get()->first();
        if (isset($produto)){
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Produto encontrado.',
                'produto' => $produto,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Produto não encontrado.',
                'produto' => [],
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $regras = [
            'nome' => 'nullable|string|max:255',
            'categoria' => 'nullable',
            'marca' => 'nullable',
            'descricao' => 'nullable|string',
            'unidade_medida' => 'nullable',
            'preco' => 'nullable|numeric|min:0',
        ];

        $feedback = [];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'mensagem' => $validator->messages(),
            ], 400);
        }

        $produto = Produto::where('id', '=', $id)->get()->first();
        if (isset($produto)){
            $produto->update($request->all());
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Produto alterado.',
                'produto' => $produto,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Produto não encontrado.',
                'produto' => [],
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $produto = Produto::where('id', '=', $id)->delete();
            if ($produto > 0){
                return response()->json([
                    'status_code' => 200,
                    'mensagem' => "Produto excluído."
                ], 200);
            }else {
                return response()->json([
                    'status_code' => 404,
                    'mensagem' => "Produto não encontrado."
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 403,
                'mensagem' => "Nao é permitido apagar este produto."
            ], 403);
        }
    }
}
