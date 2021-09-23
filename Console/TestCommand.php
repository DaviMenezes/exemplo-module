<?php

namespace Modules\Exemplo\Console;

use Illuminate\Console\Command;
use Modules\Acert\Services\AcertTypeErrors;
use Modules\Adiq\Services\AdiqTypesErrors;
use Modules\Base\Services\Errors\BaseTypeErrors;
use Modules\Bigdatacorp\Services\Error\BigdatacorpTypesErrors;
use Modules\Bs2\Services\Bs2TypesErrors;
use Modules\Celcoin\Services\Errors\CelcoinTypeErrors;
use Modules\Contact\Services\Error\ContactTypesErrors;
use Modules\Finance\Services\Error\FinanceTypesErrors;
use Modules\Klavi\Services\Errors\KlaviErrorTypes;
use Modules\Mercadopago\Services\Error\MercadopagoTypesErrors;
use Symfony\Component\Console\Input\InputOption;

class TestCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'exemplo:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $errors = collect(BaseTypeErrors::errorMessages());//1000
        $fn = function ($array) use ($errors) {
            collect($array)->map(fn($value, $key) => $errors->put($key, $value));
        };
        $fn(AcertTypeErrors::errorMessages());//2000
        $fn(BigdatacorpTypesErrors::errorMessages());//3000
        $fn(Bs2TypesErrors::errorMessages());//4000
        $fn(ContactTypesErrors::errorMessages());//5000
        $fn(FinanceTypesErrors::errorMessages());//6000
        $fn(KlaviErrorTypes::errorMessages());//7000
        $fn(CelcoinTypeErrors::errorMessages());//8000
        $fn(AdiqTypesErrors::errorMessages());//9000
        $fn(MercadopagoTypesErrors::errorMessages());//10000
        $this->info(json_encode($errors->toJson(JSON_PRETTY_PRINT)));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
//            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
