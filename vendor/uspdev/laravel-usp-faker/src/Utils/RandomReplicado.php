<?php

namespace Uspdev\Utils;

class RandomReplicado
{
    public static function docente() {
        return self::auxLocalizaPessoa('Docente');
    }

    public static function graduacao() {
        return self::auxLocalizaPessoa('Aluno de Gradua');
    }

    public static function posgraduacao() {
        return self::auxLocalizaPessoa('Aluno de P');
    }

    public static function servidor() {
        return self::auxLocalizaPessoa('Servidor');
    }

    public static function estagiario() {
        return self::auxLocalizaPessoa('Estagia');
    }

    public static function bempatrimoniado(){
        return self::auxBemPatrimoniado();
    }

    public static function bempatrimoniado_informatica(){
        return self::auxBemPatrimoniadoInformatica();
    }

    /**
     * Retorna o codpes  USP "aleatório" no contexto da unidade
     * A lógica para a condição de "aleatório" ainda não está muito boa
     * e pode ser melhorada
     */
    public static function auxLocalizaPessoa($tipvinext) {
        $codundclg = getenv('REPLICADO_CODUNDCLG');

        /** 1. Enquanto não tivermos dados retornados na consulta
         *  executaremos esse loop.
         */
        do {
            /* 2. Vamos filtrar baseado em nompes */
            $nompesFiltro = self::nompesFiltro();
            /* 3. Vamos selecionar 5 apenas - performance */
            $query = "SELECT TOP 5 codpes FROM LOCALIZAPESSOA
                    WHERE tipvinext LIKE '%{$tipvinext}%'
                    AND sitatl = 'A'
                    AND codundclg = {$codundclg}
                    AND nompes LIKE '%{$nompesFiltro}%'";
            $result = \Uspdev\Replicado\DB::fetchAll($query);
        } while(empty($result));

        /* Desses 5 (ou menos) vamos escolher um aleatório */
        $escolhido = $result[array_rand($result)];
        return $escolhido['codpes'];
    }

    public static function nompesFiltro() {
        $consoante = substr(str_shuffle("bcdfghjklmnpqrstvwxyz"),0,1);
        $vogal = substr(str_shuffle("aeiou"),0,1);
        return $consoante.$vogal;
    }

    public static function auxBemPatrimoniado() {
        /** 1. Enquanto não tivermos dados retornados na consulta
         *  executaremos esse loop.
         */
        do {
            /* 2. Vamos filtrar baseado em nompes */
            $filtro = rand(999, 9999);
            /* 3. Vamos selecionar 10 apenas - performance */
            $query = "SELECT TOP 10 numpat FROM BEMPATRIMONIADO
                    WHERE stabem = 'Ativo'
                    AND str(numpat) LIKE '%{$filtro}%'";
            $result = \Uspdev\Replicado\DB::fetchAll($query);
        } while(empty($result));

        /* Desses 10 (ou menos) vamos escolher um aleatório */
        $escolhido = $result[array_rand($result)];
        return sprintf("%.0f",$escolhido['numpat']);
    }

    public static function auxBemPatrimoniadoInformatica() {
        $informatica = [12513,51110,354384,354341,162213,9300,45624,57100];
        do {
            $aux = $informatica[array_rand($informatica)];
            $filtro = rand(99, 999);
            $query = "SELECT TOP 10 numpat FROM BEMPATRIMONIADO
                    WHERE stabem = 'Ativo'
                    AND coditmmat = $aux
                    AND str(numpat) LIKE '%{$filtro}%'";
            $result = \Uspdev\Replicado\DB::fetchAll($query);
        } while(empty($result));

        /* Desses 10 (ou menos) vamos escolher um aleatório */
        $escolhido = $result[array_rand($result)];
        return sprintf("%.0f",$escolhido['numpat']);
    }
}

