<?php
declare(strict_types=1);

namespace LaravelModelMasker\Config\Model;

class ColumnConfig
{
    const NONE_STRATEGY = 'none';
    const DEFAULT_STRATEGY = 'starify';

    private $maskStrategy;

    private $options;

    /**
     * ColumnConfig constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->maskStrategy = $data['maskStrategy'] ?? self::DEFAULT_STRATEGY;
        $this->options = $data['options'] ?? [];
    }

    public function getMaskStrategy(): string
    {
        return $this->maskStrategy;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
