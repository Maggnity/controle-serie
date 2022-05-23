<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        if(!Auth::check())
        {
            echo "Não autenticado";
            exit();
        }
        
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request
            ->session()
            ->get('mensagem');

        //retorna a view com o html + o que a view deve observar 
        return view('series.index', compact('series', 'mensagem'));
    }



    public function create()
    {
        return view('series.create');
    }

    public function store(
        SeriesFormRequest $request, 
        CriadorDeSerie $criadorDeSerie
    ) {
        $serie = $criadorDeSerie->criarSerie(
            $request->nome, 
            $request->qtd_temporadas, 
            $request->ep_por_temporada
        ); 
        
        $request->session()
        ->flash(
            'mensagem', 
            "Serie {$serie->id}, temporadas e episódios criados com sucesso {$serie->nome}");
        
        return redirect()-> route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        
        Serie::destroy($request->id);
        $request->session()
        ->flash( 
            'mensagem', 
            "Serie $nomeSerie removida com sucesso"
        );
        
        return redirect()-> route('listar_series');

    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
} 