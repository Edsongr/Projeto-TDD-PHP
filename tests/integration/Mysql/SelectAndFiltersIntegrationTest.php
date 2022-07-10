<?php

namespace QueryBuilder\Mysql;

class SelectAndFitersIntegrationTest extends \PHPUnit\Framework\TestCase
{
 
    public function testSelectComFiltroWhereEOrder()
    {
        $select = new Select;
        $select->setTable('pages');
        
        $filters = new Filters;
        $filters->where('id', '=', 1);
        $filters->orderBy('created', 'DESC');
        
        $select->filter($filters);

        $expected = "SELECT * FROM pages WHERE id=1 ORDER BY created DESC";
        
        $actual = $select->getSql();
        
        $this->assertEquals($expected, $actual);
    }


}
