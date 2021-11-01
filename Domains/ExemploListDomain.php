<?php

namespace Modules\Exemplo\Domains;

use Modules\Exemplo\Services\ExemploTestHttpService;

class ExemploListDomain
{
    public function test($data)
    {
        $response = (new ExemploTestHttpService(['name' => $data['name']]))->run();
        if ($response->baseResponse->hasError()) {
            $response->baseResponse->setMsg('Tente novamente mais tarde');
        }
        return $response->baseResponse;
    }
}
