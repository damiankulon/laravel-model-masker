<?php
declare(strict_types=1);

namespace LaravelModelMasker\Recipe;

use LaravelModelMasker\Config\Model\ColumnConfig;
use LaravelModelMasker\Config\Model\TableConfig;
use LaravelModelMasker\Exception\ConfigNotDefinedException;

class RecipeTableFactory
{
    /**
     * @param string $modelName
     * @return Table
     * @throws ConfigNotDefinedException
     */
    public function createRecipeTable(string $modelName): Table
    {
        $tableConfig = new TableConfig($modelName);
        $table = new Table(
            $modelName
        );

        if (!$tableConfig) {
            return $table;
        }

        foreach ($tableConfig->getColumns() as $key => $column) {
            $this->addMask($table, $column, $key);
        }

        return $table;
    }

    private function addMask(Table $table, ColumnConfig $column, $columnName): void
    {
        if ($column->getMaskStrategy() !== ColumnConfig::NONE_STRATEGY) {
            $table->addMask(
                $columnName,
                new StrategyDefinition($column->getMaskStrategy(), $column->getOptions())
            );
        }
    }
}
