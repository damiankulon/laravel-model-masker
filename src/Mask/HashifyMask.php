<?php
declare(strict_types=1);

namespace LaravelModelMasker\Mask;

final class HashifyMask extends AbstractMask
{
    public function apply(?string $value, array $options = []): ?string
    {
        if (is_null($value)) {
            return $value;
        }

        return sprintf($options['template'] ?? '%s', md5($value));
    }

    protected function getMaskName(): string
    {
        return 'hashify';
    }
}
