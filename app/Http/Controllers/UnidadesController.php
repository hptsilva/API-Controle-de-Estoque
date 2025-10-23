<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Unidade::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:8',
        ];

        $feedback = [
            'nome.required' => 'O nome da unidade de medida é obrigatório.',
            'nome.string' => 'O nome da unidade de medida deve ser do tipo string.',
            'nome.max' => 'O tamanho máximo do nome é de 255 caracteres.',
            'sigla.required' => 'A sigla da unidade de medida é obrigatória.',
            'sigla.string' => 'A sigla da unidade de medida deve ser do tipo string.',
            'sigla.max' => 'O tamanho máximo da sigla é de 8 caracteres.'
        ];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'mensagem' => $validator->messages(),
            ], 400);
        }

        try{
            return Unidade::create($request->all());
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
        $unidade = Unidade::where('id', '=', $id)->get()->first();
        if (isset($unidade)){
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Unidade de Medida encontrada.',
                'produto' => $unidade,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Unidade de Medida não encontrada.',
                'produto' => $unidade,
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
            'sigla' => 'string|max:8',
        ];

        $feedback = [];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'mensagem' => $validator->messages(),
            ], 400);
        }

        $unidade = Unidade::where('id', '=', $id)->get()->first();
        if (isset($unidade)){
            $unidade->update($request->all());
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Unidade de medida alterada.',
                'unidade' => $unidade,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Unidade de medida não encontrada.',
                'unidade' => [],
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $unidade = Unidade::where('id', '=', $id)->get()->first();
            if (isset($unidade)) {

                $unidade->delete();
                
                return response()->json([
                    'status_code' => 200,
                    'mensagem' => "Unidade de medida excluída."
                ], 200);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'mensagem' => "Unidade de medida não encontrada."
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'mensagem' => 'Não foi possível concluir a requisição.',
            ], 403);
        }
    }
}
