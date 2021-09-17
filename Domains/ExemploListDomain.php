<?php

namespace Modules\Exemplo\Domains;

use Modules\Exemplo\Services\ExemploListHttpService;

class ExemploListDomain
{
    public function list()
    {
        $response = (new ExemploListHttpService())->run();
        if ($response->baseResponse->hasError()) {
            //do something
            return $response->baseResponse;
        }
        $data = $response->serviceResponse->json();
        //do something with $data result

        return $response->baseResponse;
    }
}
