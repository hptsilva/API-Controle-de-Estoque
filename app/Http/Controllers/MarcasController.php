<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Marca;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Marca::all();
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
            'nome.required' => 'O nome da marca é obrigatório.',
            'nome.string' => 'O nome da marca deve ser do tipo string.',
            'nome.max' => 'O tamanho máximo da marca é de 255 caracteres.',
        ];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'mensagem' => $validator->messages(),
            ], 400);
        }

        try{
            return Marca::create($request->all());
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
        $marca = Marca::where('id', '=', $id)->get()->first();
        if (isset($marca)){
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Marca encontrada.',
                'marca' => $marca,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Marca não encontrada.',
                'marca' => $marca,
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

        $marca = Marca::where('id', '=', $id)->get()->first();
        if (isset($marca)){
            $marca->update($request->all());
            return response()->json([
                'status_code' => 200,
                'mensagem' => 'Marca alterada.',
                'marca' => $marca,
            ], 200);
        }else {
            return response()->json([
                'status_code' => 404,
                'mensagem' => 'Marca não encontrada.',
                'marca' => [],
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $marca = Marca::where('id', '=', $id)->get()->first();
            if (isset($marca)) {

                $marca->delete();
                
                return response()->json([
                    'status_code' => 200,
                    'mensagem' => "Marca excluída."
                ], 200);
            } else {
                return response()->json([
                    'status_code' => 404,
                    'mensagem' => "Marca não encontrada."
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'mensagem' => 'Não foi possível concluir a requisição.',
            ], 403);
        }
    }
}
