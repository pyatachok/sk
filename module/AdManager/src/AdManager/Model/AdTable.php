<?php
namespace AdManager\Model;

use Zend\Db\TableGateway\TableGateway;

class AdTable
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
    
    public function getAd($id)
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
    
    public function saveAd(Ad $ad) 
    {
	$data = array(
	    'creation_date' => $ad->creation_date,
	    'publisher_id' => $ad->publisher_id,
	);
	
	
	$id = (int) $ad->id;
	if (0 == $id)
	{
	    $this->tableGateway->insert($data);
	}
	else
	{
	    if ($this->getAd($id))
	    {
		$this->tableGateway->update($data, array('id' => $id));
	    }
	    else
	    {
		throw new \Exception('Form id does not exist');
	    }
	}
	
    }
    
    public function deleteAd($id)
    {
	$this->tableGateway->delete(array('id' => $id));
    }
    
}


