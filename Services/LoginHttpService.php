<?php

namespace Modules\Exemplo\Services;

use Modules\Exemplo\Services\Errors\ExemploErrorTypes;

class LoginHttpService extends ExemploHttpServiceContract
{

    public function run()
    {
        $this->post($this->getParams());
    }

    protected function getParams()
    {
        return [
            'user' => config('exemplo.user'),
            'password' => config('exemplo.password')
        ];
    }

    protected function endPoint()
    {
        return '/login';
    }

    protected function errorType(): int
    {
        return ExemploErrorTypes::EXEMPLO1;
    }
}
