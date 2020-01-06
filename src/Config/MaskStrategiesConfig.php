<?php
declare(strict_types=1);

namespace LaravelModelMasker\Config;

use Illuminate\Support\Facades\Config;
use LaravelModelMasker\Exception\ConfigNotDefinedException;

class MaskStrategiesConfig
{
    private $strategies = [];

    /**
     * MaskStrategiesConfig constructor.
     * @return void
     * @throws ConfigNotDefinedException
     */
    public function __construct()
    {
        $configData = Config::get('model-masker.maskStrategies');
        if (is_null($configData)) {
            throw new ConfigNotDefinedException('Strategy config is not defined');
        }

        foreach ($configData as $strategy) {
            $this->strategies[] = new $strategy();
        }
    }

    public function getStrategies(): array
    {
        return $this->strategies;
    }
}
