<?php

namespace Modules\Exemplo\Entities;

use Modules\Base\Entities\BaseEntity;

/**
 * @property $expiration_date
 * @property $token
 */
class TokenEntity extends BaseEntity
{
    public function __construct($expiration_date, $token)
    {
        parent::__construct([
            'expiration_date' => $expiration_date,
            'token' => $token
        ]);
    }
}
