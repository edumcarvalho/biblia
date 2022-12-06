<?php

namespace App\Http\Controllers;

use App\Http\Resources\VersaoResource;
use App\Http\Resources\VersoesCollection;
use App\Models\Versao;
use Illuminate\Http\Request;

class VersaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #essa chamado abaixo é para quenado vc não usa Collection
        // return Versao::all();

        # a chamada abaixo traz todos os campos da tabela
        // return new VersoesCollection(Versao::all());
        
        # a chamad abaixo traz apenas os campos escolhidos no select
        //return new VersoesCollection(Versao::select('id', 'nome', 'abreviacao', 'idioma_id')->get());
        
        # a chamad abaixo traz apenas os campos escolhidos no select e com paginação
        return new VersoesCollection(Versao::select('id', 'nome', 'abreviacao', 'idioma_id')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Versao::create($request->all())) {
            return response()->json([
                'message' => 'Versao cadastrado com sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar o Versao.'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($versao)
    {
        $versao =  Versao::with('idioma','livros')->find($versao);
        if ($versao){     

            return new VersaoResource($versao);
        }

        return response()->json([
            'message' => 'Versao não existe.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versao)
    {
        $versao =  Versao::find($versao);
        if ($versao){
            $versao->update($request->all());
            return $versao;
        }

        return response()->json([
            'message' => 'Versao não existe.'
        ], 404); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($versao)
    {
        if (Versao::destroy($versao)) {
            return response()->json([
                'message' => 'Versao excluído com sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao excluir o Versao.'
        ], 404);
    }
}
