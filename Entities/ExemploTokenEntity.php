<?php

namespace Modules\Exemplo\Entities;

use Modules\Base\Entities\TokenEntity;

/**
 * @property $expires
 * @property $token
 */
class ExemploTokenEntity extends TokenEntity
{
    public function __construct($expires, $token)
    {
        parent::__construct([
            'token' => $token,
            'expires' => $expires
        ]);
    }

    public static function accessToken()
    {
        return cache()->get('exemplo.token');
    }
}
