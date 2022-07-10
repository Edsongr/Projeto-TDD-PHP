<?php

namespace QueryBuilder\Mysql;

class Filters
{
    private $sql = [];

    public function where(String $filter, string $condition, $value)
    {
        $where = "WHERE %s%s%s";
        $this->sql[] = sprintf($where, $filter, $condition, $value);
        return $this;
    }

    public function orderBy(string $field, string $order)
    {
        $where = "ORDER BY %s %s";
        $this->sql[] = sprintf($where, $field, $order);
        return $this;
    }

    public function getSql() :string
    {
        return implode(' ', $this->sql);
    }

}
