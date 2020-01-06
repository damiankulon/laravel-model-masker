<?php
declare(strict_types=1);

namespace LaravelModelMasker\Mask;

interface MaskStrategyInterface
{
    public function apply(?string $value, array $options = []): ?string;

    public function supports(string $name): bool;
}
