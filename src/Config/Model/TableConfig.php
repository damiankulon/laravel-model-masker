<?php
declare(strict_types=1);

namespace LaravelModelMasker\Config\Model;

use Illuminate\Support\Facades\Config;
use LaravelModelMasker\Exception\ConfigNotDefinedException;

class TableConfig
{
    private $columns = [];

    public function __construct($name)
    {
        $configData = Config::get('model-masker.tables.' . $name);
        if (is_null($configData)) {
            throw new ConfigNotDefinedException('Config not found');
        }

        foreach ($configData as $column => $data) {
            $this->addColumn($column, new ColumnConfig($data ?? []));
        }
    }

    private function addColumn(string $name, ColumnConfig $column): void
    {
        $this->columns[$name] = $column;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }
}
