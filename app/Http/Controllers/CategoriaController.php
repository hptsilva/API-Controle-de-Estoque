<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|max:255',
        ];

        $feedback = [
            'nome.required' => 'O nome da categoria é obrigatório.',
            'nome.string' => 'O nome da categoria deve ser do tipo string.',
            'nome.max' => 'O tamanho máximo da categoria é de 255 caracteres.',
        ];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'mensagem' => $validator->messages(),
            ], 400);
        }

        try{
            return Categoria::create($request->all());
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
        $categoria = Categoria::where('id', '=', $id)->get()->first();
        if (isset($categoria)){
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Categoria encontrada.',
                'categoria' => $categoria,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Categoria não encontrada.',
                'categoria' => $categoria,
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $regras = [
            'nome' => 'required|string|max:255',
        ];

        $feedback = [];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'mensagem' => $validator->messages(),
            ], 400);
        }

        $categoria = Categoria::where('id', '=', $id)->get()->first();
        if (isset($categoria)){
            $categoria->update($request->all());
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Categoria alterada.',
                'categoria' => $categoria,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Categoria não encontrada.',
                'categoria' => [],
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $categoria = Categoria::where('id', '=', $id)->get()->first();
            if (isset($categoria)) {

                $categoria->delete();
                
                return response()->json([
                    'status_code' => 200,
                    'mensagem' => "Categoria excluída."
                ], 200);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'mensagem' => "Categoria não encontrada."
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'mensagem' => 'Não foi possível concluir a requisição.',
            ], 403);
        }
    }
}
