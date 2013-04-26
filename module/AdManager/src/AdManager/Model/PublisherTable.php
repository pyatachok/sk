<?php
namespace AdManager\Model;

use Zend\Db\TableGateway\TableGateway;

class PublisherTable
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
    
    public function getPublisher($id)
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
    
    public function savePublisher(Publisher $publisher) 
    {
	$data = array(
	    'name' => $publisher->name,
	);
	
	
	$id = (int) $publisher->id;
	if (0 == $id)
	{
	    $this->tableGateway->insert($data);
	}
	else
	{
	    if ($this->getPublisher($id))
	    {
		$this->tableGateway->update($data, array('id' => $id));
	    }
	    else
	    {
		throw new \Exception('Form id does not exist');
	    }
	}
	
    }
    
    public function deletePublisher($id)
    {
	$this->tableGateway->delete(array('id' => $id));
    }
    
}


