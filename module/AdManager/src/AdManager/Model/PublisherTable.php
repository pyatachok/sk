<?php
namespace AdManager\Model;

use Zend\Db\TableGateway\TableGateway;
use MyVendor\Table;
class PublisherTable extends Table
{
    
    
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
    
    
}


