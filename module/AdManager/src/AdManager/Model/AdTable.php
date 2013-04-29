<?php
namespace AdManager\Model;

use MyVendor\Table;
use AdManager\Model\Ad;

class AdTable extends Table
{    
    
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
    
   
}


