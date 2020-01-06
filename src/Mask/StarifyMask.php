<?php
declare(strict_types=1);

namespace LaravelModelMasker\Mask;

final class StarifyMask extends AbstractMask
{
    public function apply(?string $value, array $options = []): ?string
    {
        if (is_null($value)) {
            return $value;
        }

        return str_repeat('*', $options['length'] ?? 10);
    }

    protected function getMaskName(): string
    {
        return 'starify';
    }
}
