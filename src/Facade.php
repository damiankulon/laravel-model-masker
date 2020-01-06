<?php
declare(strict_types=1);

namespace LaravelModelMasker;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static Model mask(Model $model)
 *
 * @see \LaravelModelMasker\ModelMasker
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor() : string
    {
        return ModelMasker::class;
    }
}
