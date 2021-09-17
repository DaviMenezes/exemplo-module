<?php

namespace Modules\Exemplo\Services;

use Modules\Base\Services\HttpContract;
use Modules\Exemplo\Domains\ExemploLoginDomain;
use Modules\Exemplo\Entities\TokenEntity;

abstract class ExemploHttpServiceContract extends HttpContract
{

    protected function url()
    {
        return 'https://sandbox.exemplo.com'.$this->endPoint();
    }

    protected function accessToken(): ?string
    {
        if (is_a($this, LoginHttpService::class)) {
            return null;
        }

        /**@var TokenEntity $token*/
        if ($token = cache()->get('exemplo.token')) {
            if (now()->lessThan($token->expiration_date)) {
                return $token->token;
            }
        }

        $response = (new ExemploLoginDomain())->do();
        if ($response->baseResponse->hasError()) {
            return null;
        }
        return $token->token;
    }
}
