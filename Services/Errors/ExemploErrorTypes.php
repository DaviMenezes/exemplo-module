<?php

namespace Modules\Exemplo\Services\Errors;


use Modules\Base\Services\Errors\BaseTypeErrors;

class ExemploErrorTypes extends BaseTypeErrors
{
    const EXEMPLO1 = 100001;
    const EXEMPLO2 = 100002;

    public static function errorMessages(): array
    {
        return [
            self::EXEMPLO1 => 'Falha ao efetuar login na XPTO api',
            self::EXEMPLO2 => 'Falha ao listar os dados na XPTO api'
        ];
    }
}
