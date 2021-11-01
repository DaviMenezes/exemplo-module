<?php

namespace Modules\Exemplo\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\Exemplo\Domains\ExemploListDomain;

class ExemploController extends BaseController
{
    public function test()
    {
        request()->validate([
            'name' => 'required'
        ]);
        return $this->run('Testar requisição', function () {
            return (new ExemploListDomain())->test(request()->only(['name']));
        });
    }
}
