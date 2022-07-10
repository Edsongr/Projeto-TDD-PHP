<?php

namespace QueryBuilder\Mysql;

class Select
{
    private $table;
    private $fields = [];
    private $filters;

    public function setTable(string $table)
    {
        $this->table = $table;
        return $this;
    }

    public function setFields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function filter(Filters $filters)
    {
        $this->filters = $filters->getSql();
    }

    public function getSql() :string
    {
        $field = "*";
        if (!empty($this->fields)){
            $field = implode(', ', $this->fields);
        }

        $filter = "";
        if (!empty($this->filters)){
            $filter = ' ' . $this->filters;
        }

        return sprintf("SELECT %s FROM %s%s", $field, $this->table, $filter);
    }

}
