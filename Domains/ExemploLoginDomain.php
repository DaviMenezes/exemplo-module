<?php

namespace Modules\Exemplo\Domains;

use Modules\Exemplo\Entities\TokenEntity;
use Modules\Exemplo\Services\LoginHttpService;

class ExemploLoginDomain
{
    public function do()
    {
        $response = (new LoginHttpService())->run();
        if ($response->baseResponse->hasError()) {
            return $response;
        }
        $json = $response->serviceResponse->json();
        $token = new TokenEntity($json['expiration_date'], $json['token']);
        cache()->put('exemplo.token', $token);

        return $response;
    }
}
