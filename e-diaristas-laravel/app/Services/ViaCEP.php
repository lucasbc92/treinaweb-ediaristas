<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ViaCEP {
    public function buscar(string $cep)
    {
        $url = sprintf('viacep.com.br/ws/%s/json/', $cep);

        $res = Http::get($url);

        if($res->failed()) {
            return false;
        }

        $data = $res->json();

        if(isset($data['erro']) && $data['erro'] === true) {
            return false;
        }

        return $data;
    }
}