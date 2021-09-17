<?php

namespace Modules\Exemplo\Entities;

use Modules\Base\Entities\BaseEntity;

class LoginEntity extends BaseEntity
{
    public function __construct()
    {
        parent::__construct([
            'user' => config('exemplo.user'),
            'password' => config('exemplo.password')
        ]);
    }
}
