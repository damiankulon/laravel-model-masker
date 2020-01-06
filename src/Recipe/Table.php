<?php
declare(strict_types=1);

namespace LaravelModelMasker\Recipe;

class Table
{
    private $name;

    private $masks = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return StrategyDefinition[]
     */
    public function getMasks(): array
    {
        return $this->masks;
    }

    public function addMask(string $column, StrategyDefinition $mask)
    {
        $this->masks[$column] = $mask;
    }
}
