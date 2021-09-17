<?php

namespace Modules\Exemplo\Services\Errors;

use Modules\Base\Services\Errors\BaseErrorType;

class ExemploErrorTypes extends BaseErrorType
{
    const LOGIN_ERROR = 1001;
    const LIST_ERROR = 1002;

    public static function errorMessages(): array
    {
        return [
            self::LOGIN_ERROR => 'Falha ao efetuar login na XPTO api',
            self::LIST_ERROR => 'Falha ao listar os dados na XPTO api'
        ];
    }
}
