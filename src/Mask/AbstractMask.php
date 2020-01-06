<?php
declare(strict_types=1);

namespace LaravelModelMasker\Mask;

abstract class AbstractMask implements MaskStrategyInterface
{
    public function supports(string $name): bool
    {
        if ($name === $this->getMaskName()) {
            return true;
        }

        return false;
    }

    abstract protected function getMaskName(): string;
}
