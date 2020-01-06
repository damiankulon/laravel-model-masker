<?php
declare(strict_types=1);

namespace LaravelModelMasker;

use Illuminate\Database\Eloquent\Model;
use LaravelModelMasker\Data\Masker;
use LaravelModelMasker\Exception\ConfigNotDefinedException;
use LaravelModelMasker\Recipe\RecipeTableFactory;
use LaravelModelMasker\Recipe\Table;

class ModelMasker
{
    /** @var Model */
    private $model;

    /** @var Table */
    private $recipeTable;

    /** @var Masker */
    private $masker;
    private $tableFactory;

    /**
     * ModelMasker constructor.
     * @throws ConfigNotDefinedException
     */
    public function __construct()
    {
        $this->masker = new Masker();
        $this->tableFactory = new RecipeTableFactory();
    }

    /**
     * @param Model $model
     * @return Model
     * @throws ConfigNotDefinedException
     * @throws Mask\Exception\UnknownMaskException
     */
    public function mask(Model $model): Model
    {
        $this->setModel($model);

        $data = $this->masker->applyMasks(
            $this->model->getAttributes(),
            $this->recipeTable->getMasks()
        );

        return $this->model->fill($data);
    }

    /**
     * @param Model $model
     * @throws ConfigNotDefinedException
     */
    private function setModel(Model $model): void
    {
        $this->recipeTable = $this->tableFactory->createRecipeTable(get_class($model));
        $this->model = $model;
    }

}
