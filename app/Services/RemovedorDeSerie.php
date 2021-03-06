<?php

namespace App\Services;

use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerSerie(int $serieId): string
    {
        $nomeSerie = '';
        DB::transaction(function() use ($serieId, &$nomeSerie){

            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            
            $this->removerTemporadas($serie);
            $serie->delete();

        });

        return $nomeSerie;
    }

    private function removerTemporadas($serie): void
    {
        $serie->temporadas->each(function($temporada){
            $this->removerEpisodios($temporada);
            $temporada->delete(); 

        });
    }

    private function removerEpisodios($temporada): void
    {
        $temporada->episodios->each(function($episodio){
            $episodio->delete();
        });
    }
}