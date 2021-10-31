<?php

namespace Modules\Exemplo\Services;

use Modules\Base\Services\HttpContract;
use Modules\Exemplo\Domains\ExemploLoginDomain;
use Modules\Exemplo\Entities\ExemploTokenEntity;

abstract class ExemploHttpServiceContract extends HttpContract
{

    protected function url()
    {
        return 'https://webhook.site';
    }

    protected function accessToken(): ?string
    {
        return null;
//        return $this->getToken();
    }

    protected function loginContract()
    {
        return ExemploLoginHttpService::class;
    }

    protected function moduleName(): string
    {
        return 'Exemplo';
    }

    protected function getToken()
    {
        if (is_a($this, ExemploLoginHttpService::class)) {
            return null;
        }

        /**@var ExemploTokenEntity $token */
        if ($token = ExemploTokenEntity::accessToken()) {
            if (now()->lessThan($token->expires)) {
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
