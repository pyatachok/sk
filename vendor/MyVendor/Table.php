<?php

/**
 * Description of Table
 *
 * @author pyatachok
 */
namespace MyVendor;

use Zend\Db\TableGateway\TableGateway;


class Table
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
	$this->tableGateway = $tableGateway;
    }
    
    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
	return $resultSet;
    }
    
    public function delete($id)
    {
	$this->tableGateway->delete(array('id' => $id));
    }
    
    public function getById($id)
    {
	$id = (int) $id;
	$rowset = $this->tableGateway->select(array('id' => $id));
	$row = $rowset->current();
	
	if (!$row)
	{
	    throw new Exception ("Could not find row $id");
	}
	return $row;
    }
    
}
