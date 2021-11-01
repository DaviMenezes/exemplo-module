<?php

namespace Modules\Exemplo\Services;

use Modules\Exemplo\Services\Errors\ExemploErrorTypes;

class ExemploTestHttpService extends ExemploHttpServiceContract
{

    public function run()
    {
        return $this->post($this->getParams());
    }

    protected function endPoint()
    {
        return '/7e727090-c123-4e63-8b70-d7b47cfe1be8';
    }

    protected function errorType(): int
    {
        return ExemploErrorTypes::EXEMPLO2;
    }
}
