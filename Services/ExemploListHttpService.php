<?php

namespace Modules\Exemplo\Services;

use Modules\Exemplo\Services\Errors\ExemploErrorTypes;

class ExemploListHttpService extends ExemploHttpServiceContract
{

    public function run()
    {
        return $this->post($this->getParams());
    }

    protected function endPoint()
    {
        return '/list';
    }

    protected function errorType(): int
    {
        return ExemploErrorTypes::LIST_ERROR;
    }
}
