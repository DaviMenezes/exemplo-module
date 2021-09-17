<?php

namespace Modules\Exemplo\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Exemplo\Domains\ExemploListDomain;

class ExemploController extends Controller
{
    public function list()
    {
        return (new ExemploListDomain())->list();
    }
}
