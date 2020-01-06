<?php
declare(strict_types=1);

namespace LaravelModelMasker\Mask;


use LaravelModelMasker\Mask\Exception\UnknownMaskException;

class MaskStrategyProvider
{
    private $masks = [];

    public function __construct(iterable $masks)
    {
        foreach ($masks as $mask) {
            $this->addMask($mask);
        }
    }

    private function addMask(MaskStrategyInterface $mask): void
    {
        $this->masks[] = $mask;
    }

    /**
     * @param string $name
     * @return MaskStrategyInterface
     * @throws UnknownMaskException
     */
    public function getMask(string $name): MaskStrategyInterface
    {
        foreach ($this->masks as $mask) {
            if ($mask->supports($name)) {
                return $mask;
            }
        }

        throw new UnknownMaskException('Unknown mask "' . $name . '".');
    }
}
