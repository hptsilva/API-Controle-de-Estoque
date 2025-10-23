<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Fornecedore;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Fornecedore::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|integer|min_digits:14|max_digits:14',
            'endereco' => 'nullable|string',
            'telefone' => 'required|integer|max_digits:10',
            'email' => 'required|email',
            'contato' => 'required|string|max:255',
        ];

        $feedback = [
            'nome.required' => 'Preencha o nome do fornecedor.',
            'nome.string' => 'O nome do fornecedor deve ser do tipo string.',
            'nome.max' => 'O nome do fornecedor deve ter no máximo 255 caracteres.',
            'cnpj.required' => 'Preencha o cnpj do fornecedor.',
            'cnpj.integer' => 'O valor do cnpj deve ser do tipo inteiro.',
            'cnpj.min_digits' => 'O CNPJ deve ter 14 dígitos.',
            'cnpj.max_digits' => 'O CNPJ deve ter 14 dígitos.',
            'endereco.string' => 'O endereço deve ser do tipo string.',
            'telefone.required' => 'Preencha o telefone do fornecedor.',
            'telefone.integer' => 'O telefone deve ser do tipo inteiro',
            'telefone.max_digits' => 'O telefone deve ter no máximo 10 dígitos.',
            'email.required' => 'Preencha o email do fornecedor.',
            'email.email' => 'E-mail inválido.',
            'contato.required' => 'Preencha o contato do fornecedor.',
            'contato.string' => 'O contato do fornecedor deve ser do tipo string.',
            'contato.max' => 'O contato do fornecedor deve ter no máximo 255 caracteres.'
        ];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'mensagem' => $validator->messages(),
            ], 400);
        }

        try{
            return Fornecedore::create($request->all());
        }
        catch (Exception){
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
        $fornecedor = Fornecedore::where('id', '=', $id)->get()->first();
        if (isset($fornecedor)){
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Fornecedor encontrado.',
                'fornecedor' => $fornecedor,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Fornecedor não encontrado.',
                'fornecedor' => [],
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $regras = [
            'nome' => 'string|max:255',
            'cnpj' => 'integer|min_digits:14|max_digits:14',
            'endereco' => 'string',
            'telefone' => 'integer|max_digits:10',
            'email' => 'email',
            'contato' => 'string|max:255',
        ];

        $feedback = [];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'mensagem' => $validator->messages(),
            ], 400);
        }

        $fornecedor = Fornecedore::where('id', '=', $id)->get()->first();
        if (isset($fornecedor)){
            $fornecedor->update($request->all());
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Fornecedor alterado.',
                'fornecedor' => $fornecedor,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Fornecedor não encontrado.',
                'fornecedor' => [],
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fornecedor = Fornecedore::where('id', '=', $id)->delete();
        if ($fornecedor > 0){
            return response()->json([
                'status_code' => 200,
                'mensagem' => "Fornecedor excluído."
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => "Fornecedor não encontrado."
            ], 404);
        }
    }
}
