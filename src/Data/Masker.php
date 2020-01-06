<?php
declare(strict_types=1);

namespace LaravelModelMasker\Data;

use LaravelModelMasker\Config\MaskStrategiesConfig;
use LaravelModelMasker\Exception\ConfigNotDefinedException;
use LaravelModelMasker\Mask\Exception\UnknownMaskException;
use LaravelModelMasker\Mask\MaskStrategyProvider;
use LaravelModelMasker\Recipe\StrategyDefinition;

class Masker
{
    private $maskStrategyProvider;

    /**
     * Masker constructor.
     * @throws ConfigNotDefinedException
     */
    public function __construct()
    {
        $config = new MaskStrategiesConfig();
        $this->maskStrategyProvider = new MaskStrategyProvider($config->getStrategies());
    }

    /**
     * @param array $data
     * @param array $masks
     * @return array
     * @throws UnknownMaskException
     */
    public function applyMasks(array $data, array $masks): array
    {
        foreach ($masks as $column => $definition) {
            if (isset($data[$column])) {
                $data[$column] = $this->maskData($data[$column], $definition);
            }
        }
        return $data;
    }

    /**
     * @param $value
     * @param StrategyDefinition $definition
     * @return string|null
     * @throws UnknownMaskException
     */
    private function maskData($value, StrategyDefinition $definition): ?string
    {
        return $this->maskStrategyProvider->getMask($definition->getName())
            ->apply($value, $definition->getOptions());
    }
}
