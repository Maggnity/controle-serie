<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request; 

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = [
            'lost',
            'house',
            'The Walking Dead'
        ];
        
        //retorna a view com o html + o que a view deve observar 
        return view('series.index', ['series' => $series]);
    }



    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nome = $request->nome;
        $serie = new Serie();
        $serie->nome =$nome;
        var_dump($serie->save());
    }
} 