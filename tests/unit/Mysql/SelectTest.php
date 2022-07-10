<?php

namespace QueryBuilder\Mysql;

class SelectTest extends \PHPUnit\Framework\TestCase
{
 
    public function testSelectSemFiltro()
    {
        $select = new Select;
        $select->setTable('pages');
        $actual = $select->getSql();
        $expected = "SELECT * FROM pages";
        $this->assertEquals($expected, $actual);
    }

    public function testSelectComFiltro()
    {
        $select = new Select;
        $select->setTable("pages");

        $stub = $this->getMockBuilder(Filters::Class)
            ->disableOriginalConstructor()
            ->getMock();

        $stub->method('getSql')
            ->willReturn('WHERE id=1 ORDER BY created DESC');

        $select->filter($stub);

        $actual = $select->getSql();
        $expected = "SELECT * FROM pages WHERE id=1 ORDER BY created DESC";

        $this->assertEquals($expected, $actual);
    }

    public function testSelectEspecificandoOsCampos()
    {
        $select = new Select;
        $select->setTable('users');
        $select->setFields(['nome', 'email']);
        
        $actual = $select->getSql();
        $expected = "SELECT nome, email FROM users";

        $this->assertEquals($expected, $actual);
    }

}
