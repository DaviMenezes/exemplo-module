<?php

namespace Modules\Exemplo\Domains;

use Modules\Exemplo\Entities\ExemploTokenEntity;
use Modules\Exemplo\Services\ExemploLoginHttpService;

class ExemploLoginDomain
{
    public function do()
    {
        $response = (new ExemploLoginHttpService())->run();
        if ($response->baseResponse->hasError()) {
            return $response;
        }
        $json = $response->serviceResponse->json();
        $token = new ExemploTokenEntity($json['expiration_date'], $json['token']);
        cache()->put('exemplo.token', $token);

        return $response;
    }
}
